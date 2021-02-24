<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Bridge\PhpUnit\DeprecationErrorHandler;

/**
 * @internal
 */
class Configuration
{
    /**
     * @var int[]
     */
    private $thresholds;

    /**
     * @var string
     */
    private $regex;

    /**
     * @var bool
     */
    private $enabled = true;

    /**
     * @var bool
     */
    private $verboseOutput = true;

    /**
     * @param int[]  $thresholds    A hash associating groups to thresholds
     * @param string $regex         Will be matched against messages, to decide
     *                              whether to display a stack trace
     * @param bool   $verboseOutput
     */
    private function __construct(array $thresholds = [], $regex = '', $verboseOutput = true)
    {
        $groups = ['total', 'indirect', 'direct', 'self'];

        foreach ($thresholds as $group => $threshold) {
            if (!\in_array($group, $groups, true)) {
                throw new \InvalidArgumentException(sprintf('Unrecognized threshold "%s", expected one of "%s".', $group, implode('", "', $groups)));
            }
            if (!is_numeric($threshold)) {
                throw new \InvalidArgumentException(sprintf('Threshold for group "%s" has invalid value "%s".', $group, $threshold));
            }
            $this->thresholds[$group] = (int) $threshold;
        }
        if (isset($this->thresholds['direct'])) {
            $this->thresholds += [
                'self' => $this->thresholds['direct'],
            ];
        }
        if (isset($this->thresholds['indirect'])) {
            $this->thresholds += [
                'direct' => $this->thresholds['indirect'],
                'self' => $this->thresholds['indirect'],
            ];
        }
        foreach ($groups as $group) {
            if (!isset($this->thresholds[$group])) {
                $this->thresholds[$group] = 999999;
            }
        }
        $this->regex = $regex;
        $this->verboseOutput = $verboseOutput;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param mixed[] $deprecations
     *
     * @return bool
     */
    public function tolerates(array $deprecations)
    {
        $deprecationCounts = [];
        foreach ($deprecations as $key => $deprecation) {
            if (false !== strpos($key, 'Count') && false === strpos($key, 'legacy')) {
                $deprecationCounts[$key] = $deprecation;
            }
        }

        if (array_sum($deprecationCounts) > $this->thresholds['total']) {
            return false;
        }
        foreach (['self', 'direct', 'indirect'] as $deprecationType) {
            if ($deprecationCounts['remaining '.$deprecationType.'Count'] > $this->thresholds[$deprecationType]) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param string $message
     *
     * @return bool
     */
    public function shouldDisplayStackTrace($message)
    {
        return '' !== $this->regex && preg_match($this->regex, $message);
    }

    /**
     * @return bool
     */
    public function isInRegexMode()
    {
        return '' !== $this->regex;
    }

    /**
     * @return bool
     */
    public function verboseOutput()
    {
        return $this->verboseOutput;
    }

    /**
     * @param string $serializedConfiguration an encoded string, for instance
     *                                        max[total]=1234&max[indirect]=42
     *
     * @return self
     */
    public static function fromUrlEncodedString($serializedConfiguration)
    {
        parse_str($serializedConfiguration, $normalizedConfiguration);
        foreach (array_keys($normalizedConfiguration) as $key) {
            if (!\in_array($key, ['max', 'disabled', 'verbose'], true)) {
                throw new \InvalidArgumentException(sprintf('Unknown configuration option "%s".', $key));
            }
        }

        if (isset($normalizedConfiguration['disabled'])) {
            return self::inDisabledMode();
        }

        $verboseOutput = true;
        if (isset($normalizedConfiguration['verbose'])) {
            $verboseOutput = (bool) $normalizedConfiguration['verbose'];
        }

        return new self(
            isset($normalizedConfiguration['max']) ? $normalizedConfiguration['max'] : [],
            '',
            $verboseOutput
        );
    }

    /**
     * @return self
     */
    public static function inDisabledMode()
    {
        $configuration = new self();
        $configuration->enabled = false;

        return $configuration;
    }

    /**
     * @return self
     */
    public static function inStrictMode()
    {
        return new self(['total' => 0]);
    }

    /**
     * @return self
     */
    public static function inWeakMode()
    {
        return new self([], '', false);
    }

    /**
     * @return self
     */
    public static function fromNumber($upperBound)
    {
        return new self(['total' => $upperBound]);
    }

    /**
     * @return self
     */
    public static function fromRegex($regex)
    {
        return new self([], $regex);
    }
}
