<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

/**
 * Author: Nikolas Schmidt-Voigt
 * Source: http://nikolassv.de/blogpost/parser-fuer-die-robots-txt-in-php/
 */

namespace Pimcore\Helper;

use Pimcore\Cache;

class RobotsTxt
{
    /**
     * @var null
     */
    private $_domain = null;

    /**
     * @var array
     */
    private $_rules = [];

    /**
     * @param string $domain
     */
    public function __construct($domain)
    {
        $this->_domain = $domain;
        try {
            $robotsUrl = $domain . '/robots.txt';
            $cacheKey = 'robots_' . crc32($robotsUrl);

            if (!$robotsTxt = Cache::load($cacheKey)) {
                $robotsTxt = \Pimcore\Tool::getHttpData($robotsUrl);
                Cache::save($robotsTxt, $cacheKey, ['system'], 3600, 999, true);
            }

            $this->_rules = $this->_makeRules($robotsTxt);
        } catch (\Exception $e) {
        }
    }

    /**
     * @param string $url
     * @param string $userAgent
     *
     * @return bool
     */
    public function isUrlBlocked($url, $userAgent = '*')
    {
        if (!isset($this->_rules[$userAgent])) {
            $rules = isset($this->_rules['*']) ?
                $this->_rules['*'] : [];
        } else {
            $rules = $this->_rules[$userAgent];
        }

        if (count($rules) == 0) {
            return false;
        }

        $urlArray = parse_url($url);
        if (isset($urlArray['path'])) {
            $url = $urlArray['path'];

            if (isset($urlArray['query'])) {
                $url .= '?' . $urlArray['query'];
            }

            if (isset($urlArray['fragment'])) {
                $url .= '#' . $urlArray['fragment'];
            }
        }

        $blocked = false;
        $longest = 0;

        foreach ($rules as $r) {
            if (preg_match($r['path'], $url) && (strlen($r['path']) >= $longest)) {
                $longest = strlen($r['path']);
                $blocked = !($r['allow']);
            }
        }

        return $blocked;
    }

    /**
     * @param string $robotsTxt
     *
     * @return array
     */
    private function _makeRules($robotsTxt)
    {
        $rules = [];
        $lines = explode("\n", $robotsTxt);

        $lines = array_filter($lines, function ($l) {
            return preg_match('#^((dis)?allow|user-agent)[^:]*:.+#i', $l) > 0;
        });

        $userAgent = '';
        foreach ($lines as $l) {
            list($first, $second) = explode(':', $l);
            $first = trim($first);
            $second = trim($second);

            if (preg_match('#^user-agent$#i', $first)) {
                $userAgent = $second;
            } else {
                if ($userAgent) {
                    $pathRegEx = $this->_getRegExByPath($second);
                    $allow = (preg_match('#^dis#i', $first) !== 1);

                    $rules[$userAgent][] = [
                        'path' => $pathRegEx,
                        'allow' => $allow,
                    ];
                }
            }
        }

        return $rules;
    }

    /**
     * @param string $path
     *
     * @return string
     */
    private function _getRegExByPath($path)
    {
        $regEx = '';
        $path = trim($path);

        $regEx = preg_replace('#([\^+?.()])#', '\\\\$1', $path);
        $regEx = str_replace('*', '.*', $regEx);

        return '#' . $regEx . '#';
    }
}
