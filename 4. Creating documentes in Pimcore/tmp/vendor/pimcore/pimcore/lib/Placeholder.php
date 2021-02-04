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

namespace Pimcore;

class Placeholder
{
    /**
     * Prefix for the Placeholders
     *
     * @var string
     */
    protected static $placeholderPrefix = '%';

    /**
     * Suffix for the Placeholders
     *
     * @var string
     */
    protected static $placeholderSuffix = ';';

    /**
     * Prefixes for the Placeholder Classes
     *
     * @var array
     */
    protected static $placeholderClassPrefixes = ['Pimcore_Placeholder_', 'Website_Placeholder_', '\\Pimcore\\Placeholder\\', '\\Website\\Placeholder\\', '\\AppBundle\\Placeholder\\'];

    /**
     * Contains the document object
     *
     * @var Model\Document | null
     */
    protected $document;

    /**
     * @param string $classPrefix
     *
     * @throws \Exception
     */
    public static function addPlaceholderClassPrefix($classPrefix)
    {
        if (!is_string($classPrefix) || $classPrefix == '') {
            throw new \Exception('$classPrefix has to be a valid string and mustn\'t be empty');
        }

        self::$placeholderClassPrefixes[] = $classPrefix;
    }

    /**
     * @param string $classPrefix
     *
     * @return bool
     *
     * @throws \Exception
     */
    public static function removePlaceholderClassPrefix($classPrefix)
    {
        if (!is_string($classPrefix) || $classPrefix == '') {
            throw new \Exception('$classPrefix has to be a valid string and mustn\'t be empty');
        }

        $arrayIndex = array_search($classPrefix, self::$placeholderClassPrefixes);

        if ($arrayIndex === false) {
            return false;
        } else {
            unset(self::$placeholderClassPrefixes[$arrayIndex]);

            return true;
        }
    }

    /**
     * Returns the Placeholder class prefixes
     *
     * @static
     *
     * @return array
     */
    public static function getPlaceholderClassPrefixes()
    {
        return array_reverse(self::$placeholderClassPrefixes);
    }

    /**
     * Returns the Placeholder prefix
     *
     * @return string
     */
    public static function getPlaceholderPrefix()
    {
        return self::$placeholderPrefix;
    }

    /**
     * Returns the Placeholder suffix
     *
     * @return string
     */
    public static function getPlaceholderSuffix()
    {
        return self::$placeholderSuffix;
    }

    /**
     * @param string $suffix
     *
     * @throws \Exception
     */
    public function setPlaceholderSuffix($suffix)
    {
        if (!is_string($suffix)) {
            throw new \Exception("\$suffix mustn'n be empty");
        }
        self::$placeholderSuffix = $suffix;
    }

    /**
     * Detects the Placeholders in a string and returns an array with the placeholder information
     *
     * @param string $contentString
     * @param null | array $params
     * @param null | Model\Document $document
     *
     * @return array
     */
    public function detectPlaceholders($contentString, $params, $document = null)
    {
        $placeholderStack = [];

        $regex = '/' . self::$placeholderPrefix . "([a-z_]+)\(([a-z_0-9]+)[\s,]*(.*?)\)" . self::$placeholderSuffix . '/is';
        preg_match_all($regex, $contentString, $matches);

        if (is_array($matches[1])) {
            foreach ($matches[1] as $key => $match) {
                $placeholderString = $matches[0][$key]; //placeholder string
                $placeholderClass = $matches[1][$key]; //placeholder php class
                $placeholderKey = $matches[2][$key]; //key for the dynamic param
                $placeholderConfigString = $matches[3][$key];

                if ($placeholderConfigString) {
                    //try to create the json config object
                    try {
                        $configJsonString = str_replace(['&quot;', "'"], '"', $placeholderConfigString);
                        $configArray = json_decode($configJsonString, true);
                        if ($configArray === null && json_last_error() !== JSON_ERROR_NONE) {
                            throw new \Exception('The JSON string in the PlaceholderConfig could not be converted.');
                        } elseif (!is_array($configArray)) {
                            throw new \Exception('The JSON string in the PlaceholderConfig should be an array.');
                        }
                        $placeholderConfig = new \Pimcore\Config\Config($configArray, null);
                    } catch (\Exception $e) {
                        Logger::warn('PlaceholderConfig is not a valid JSON string. PlaceholderConfig for ' . $placeholderClass . ' ignored.');
                        continue;
                    }
                } else {
                    //create an empty config object if no config object was passed
                    $placeholderConfig = new \Pimcore\Config\Config([]);
                }

                $placeholderStack[] = ['placeholderString' => $placeholderString,
                    'placeholderClass' => $placeholderClass,
                    'placeholderKey' => $placeholderKey,
                    'placeholderConfig' => $placeholderConfig,
                    'document' => $document,
                    'params' => $params,
                    'contentString' => $contentString, ];
            }
        }

        return $placeholderStack;
    }

    /**
     * Helper to simply replace the placeholders with their value
     *
     * @param string | Model\Document $mixed
     * @param array $params
     * @param null | Model\Document $document
     * @param bool $enableLayoutOnPlaceholderReplacement
     *
     * @return string
     */
    public function replacePlaceholders($mixed, $params = [], $document = null, $enableLayoutOnPlaceholderReplacement = true)
    {
        $contentString = null;
        if (is_string($mixed)) {
            $contentString = $mixed;
        } elseif ($mixed instanceof Model\Document) {
            $contentString = Model\Document\Service::render($mixed, $params, $enableLayoutOnPlaceholderReplacement);
        }
        if ($document instanceof Model\Document === false) {
            $document = null;
        }

        //detects the placeholders
        $placeholderStack = $this->detectPlaceholders($contentString, $params, $document);

        //replaces the placeholders if any were found
        if (!empty($placeholderStack)) {
            $replacedString = $this->replacePlaceholdersFromStack($placeholderStack);

            return $replacedString;
        } else {
            return $contentString;
        }
    }

    /**
     * Creates the Placeholder objects and replaces the placeholder string
     * with the rendered content of the placeholder object
     *
     * @param array $placeholderStack
     *
     * @return string
     */
    protected function replacePlaceholdersFromStack($placeholderStack = [])
    {
        $stringReplaced = null;
        if (!empty($placeholderStack)) {
            foreach ($placeholderStack as $placeholder) {
                $placeholderClassPrefixes = self::getPlaceholderClassPrefixes();
                $placeholderObject = null;

                foreach ($placeholderClassPrefixes as $classPrefix) {
                    $className = $classPrefix . $placeholder['placeholderClass'];
                    if (Tool::classExists($className)) {
                        $placeholderObject = new $className();
                        break;
                    }
                }

                if (is_null($stringReplaced)) {
                    $stringReplaced = $placeholder['contentString'];
                }

                if ($placeholderObject instanceof Placeholder\AbstractPlaceholder) {

                    //setting values from placeholder stack to placeholder objects
                    foreach (array_keys($placeholder) as $key) {
                        if ($key == 'placeholderClass') {
                            continue;
                        }
                        $placeholderObject->{'set' . ucfirst($key)}($placeholder[$key]);
                    }
                    $placeholderObject->setLocale();

                    $replaceWith = $placeholderObject->getReplacement();
                    $stringReplaced = str_replace($placeholderObject->getPlaceholderString(), $replaceWith, $stringReplaced);
                } else {
                    Logger::warn('Ignoring Placeholder "' . $placeholder['placeholderClass'] . '" -> Class not Found or not an instance of Pimcore_Placeholder_Abstract!');
                }
            }
        }

        return $stringReplaced;
    }
}
