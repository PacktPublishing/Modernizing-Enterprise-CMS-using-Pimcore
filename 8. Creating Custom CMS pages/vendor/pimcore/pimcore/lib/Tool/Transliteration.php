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

namespace Pimcore\Tool;

class Transliteration
{
    /**
     * @static
     *
     * @param string $value
     * @param string|null $language
     *
     * @return string
     */
    public static function toASCII($value, $language = null)
    {
        // the transliteration is based on the locale
        // äüö is in EN auo in DE  aeueoe
        if (!$language) {
            $locale = \Pimcore::getContainer()->get('pimcore.locale')->findLocale();
            if ($locale) {
                $language = \Locale::getPrimaryLanguage($locale);
            }

            if (!$language) {
                $language = 'en'; // default is "en"
            }
        }

        $value = self::_transliterationProcess($value, '~', $language);
        $value = transliterator_transliterate('Any-Latin; Latin-ASCII; [^\u001F-\u007f] remove', $value);
        $value = trim($value);

        return $value;
    }

    /**
     * The following functions are based on:
     * http://drupal.org/project/transliteration
     * http://sourceforge.net/projects/phputf8/
     *
     * The data in Transliteration/Data is a port of Text::Unidecode
     * Data was transformed to PHP by the libs above
     * http://search.cpan.org/~sburke/Text-Unidecode-0.04/lib/Text/Unidecode.pm
     */

    /**
     * @static
     *
     * @param string $string
     * @param string $unknown
     * @param string|null $source_langcode
     *
     * @return string
     */
    private static function _transliterationProcess($string, $unknown = '?', $source_langcode = null)
    {
        // ASCII is always valid NFC! If we're only ever given plain ASCII, we can
        // avoid the overhead of initializing the decomposition tables by skipping
        // out early.
        if (!preg_match('/[\x80-\xff]/', $string)) {
            return $string;
        }

        static $tail_bytes;

        if (!isset($tail_bytes)) {
            // Each UTF-8 head byte is followed by a certain number of tail bytes.
            $tail_bytes = [];
            for ($n = 0; $n < 256; $n++) {
                if ($n < 0xc0) {
                    $remaining = 0;
                } elseif ($n < 0xe0) {
                    $remaining = 1;
                } elseif ($n < 0xf0) {
                    $remaining = 2;
                } elseif ($n < 0xf8) {
                    $remaining = 3;
                } elseif ($n < 0xfc) {
                    $remaining = 4;
                } elseif ($n < 0xfe) {
                    $remaining = 5;
                } else {
                    $remaining = 0;
                }
                $tail_bytes[chr($n)] = $remaining;
            }
        }

        // Chop the text into pure-ASCII and non-ASCII areas; large ASCII parts can
        // be handled much more quickly. Don't chop up Unicode areas for punctuation,
        // though, that wastes energy.
        preg_match_all('/[\x00-\x7f]+|[\x80-\xff][\x00-\x40\x5b-\x5f\x7b-\xff]*/', $string, $matches);

        $result = '';
        foreach ($matches[0] as $str) {
            if ($str[0] < "\x80") {
                // ASCII chunk: guaranteed to be valid UTF-8 and in normal form C, so
                // skip over it.
                $result .= $str;
                continue;
            }

            // We'll have to examine the chunk byte by byte to ensure that it consists
            // of valid UTF-8 sequences, and to see if any of them might not be
            // normalized.
            //
            // Since PHP is not the fastest language on earth, some of this code is a
            // little ugly with inner loop optimizations.

            $head = '';
            $chunk = strlen($str);
            // Counting down is faster. I'm *so* sorry.
            $len = $chunk + 1;

            for ($i = -1; --$len;) {
                $c = $str[++$i];
                if ($remaining = $tail_bytes[$c]) {
                    // UTF-8 head byte!
                    $sequence = $head = $c;
                    do {
                        // Look for the defined number of tail bytes...
                        if (--$len && ($c = $str[++$i]) >= "\x80" && $c < "\xc0") {
                            // Legal tail bytes are nice.
                            $sequence .= $c;
                        } else {
                            if ($len == 0) {
                                // Premature end of string! Drop a replacement character into
                                // output to represent the invalid UTF-8 sequence.
                                $result .= $unknown;
                                break 2;
                            } else {
                                // Illegal tail byte; abandon the sequence.
                                $result .= $unknown;
                                // Back up and reprocess this byte; it may itself be a legal
                                // ASCII or UTF-8 sequence head.
                                --$i;
                                ++$len;
                                continue 2;
                            }
                        }
                    } while (--$remaining);

                    $n = ord($head);
                    $ord = null;
                    if ($n <= 0xdf) {
                        $ord = ($n - 192) * 64 + (ord($sequence[1]) - 128);
                    } elseif ($n <= 0xef) {
                        $ord = ($n - 224) * 4096 + (ord($sequence[1]) - 128) * 64 + (ord($sequence[2]) - 128);
                    } elseif ($n <= 0xf7) {
                        $ord = ($n - 240) * 262144 + (ord($sequence[1]) - 128) * 4096 + (ord($sequence[2]) - 128) * 64 + (ord($sequence[3]) - 128);
                    } elseif ($n <= 0xfb) {
                        $ord = ($n - 248) * 16777216 + (ord($sequence[1]) - 128) * 262144 + (ord($sequence[2]) - 128) * 4096 + (ord($sequence[3]) - 128) * 64 + (ord($sequence[4]) - 128);
                    } elseif ($n <= 0xfd) {
                        $ord = ($n - 252) * 1073741824 + (ord($sequence[1]) - 128) * 16777216 + (ord($sequence[2]) - 128) * 262144 + (ord($sequence[3]) - 128) * 4096 + (ord($sequence[4]) - 128) * 64 + (ord($sequence[5]) - 128);
                    }
                    $result .= self::_transliterationReplace($ord, $unknown, $source_langcode);
                    $head = '';
                } elseif ($c < "\x80") {
                    // ASCII byte.
                    $result .= $c;
                    $head = '';
                } elseif ($c < "\xc0") {
                    // Illegal tail bytes.
                    if ($head == '') {
                        $result .= $unknown;
                    }
                } else {
                    // Miscellaneous freaks.
                    $result .= $unknown;
                    $head = '';
                }
            }
        }

        return $result;
    }

    /**
     * @static
     *
     * @param int $ord
     * @param string $unknown
     * @param string|null $langcode
     *
     * @return string
     */
    private static function _transliterationReplace($ord, $unknown = '?', $langcode = null)
    {
        $map = [];

        if (!$langcode) {
            $langcode = 'en';
        }

        $bank = $ord >> 8;

        if (!isset($map[$bank][$langcode])) {
            $file = __DIR__ . '/Transliteration/Data/' . sprintf('x%02x', $bank) . '.php';
            if (file_exists($file)) {
                $base = [];
                $variant = [];
                // contains the $base variable
                include($file);
                if ($langcode !== 'en' && isset($variant[$langcode])) {
                    // Merge in language specific mappings.
                    $map[$bank][$langcode] = $variant[$langcode] + $base;
                } else {
                    $map[$bank][$langcode] = $base;
                }
            } else {
                $map[$bank][$langcode] = [];
            }
        }

        $ord = $ord & 255;

        return isset($map[$bank][$langcode][$ord]) ? $map[$bank][$langcode][$ord] : $unknown;
    }
}
