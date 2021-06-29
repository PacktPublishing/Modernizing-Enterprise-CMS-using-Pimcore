<?php
/**
 * Playbuzz.php
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
 * Playbuzz Provider
 * @link https://playbuzz.com
 */
class Playbuzz extends ProviderAdapter implements ProviderInterface
{
    /** inline {@inheritdoc} */
    protected $endpoint = 'https://oembed.ex.co/item?format=json';

    /** inline {@inheritdoc} */
    protected static $hosts = [
        'playbuzz.com', 'app.ex.co'
    ];

    /** inline {@inheritdoc} */
    protected $httpsSupport = true;

    /** inline {@inheritdoc} */
    protected $responsiveSupport = true;

    /** inline {@inheritdoc} */
    public function validateUrl(Url $url)
    {
        return (bool) (
            preg_match('~playbuzz\.com/([^/]+)/([^/]+)~i', (string) $url) ||
            preg_match('~app\.ex\.co/stories/([^/]+)/([^/]+)~i', (string) $url)
        );
    }

    /** inline {@inheritdoc} */
    public function normalizeUrl(Url $url)
    {
        $url->convertToHttps();
        $url->removeQueryString();
        $url->removeLastSlash();

        return $url;
    }

}
