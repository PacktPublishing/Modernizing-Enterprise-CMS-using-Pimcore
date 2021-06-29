<?php
/**
 * Apester.php
 *
 * @package Embera
 * @author Michael Pratt <yo@michael-pratt.com>
 * @link   http://www.michael-pratt.com/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Embera\Provider;

use Embera\Url;

/**
 * Apester Provider
 * Unleash the real potential of your content marketing, collect leads and turn any piece of
 * content interactive, with Apester stories, quizzes, polls, video, personality tests and more.
 *
 * @link https://www.apester.com
 *
 */
class Apester extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://display.apester.com/oembed?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'renderer.apester.com'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (preg_match('~apester\.com/v2/([^/]+)$~i', (string) $url));
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        return $url;
    }

    /** inline {@inheritdoc} */
    public function getFakeResponse()
    {
        $embedUrl = (string) $this->url . '?oembed=true&maxWidth={width}&maxHeight={height}';

        $attr = [];
        $attr[] = 'src="' . $embedUrl . '"';
        $attr[] = 'width="{width}"';
        $attr[] = 'height="{height}"';


        return [
            'type' => 'rich',
            'provider_name' => 'Apester',
            'provider_url' => 'https://www.apester.com/',
            'title' => 'Unknown title',
            'html' => '<div style="width: {width}; height: {height}"><iframe ' . implode(' ', $attr). ' /></div>',
        ];
    }

}
