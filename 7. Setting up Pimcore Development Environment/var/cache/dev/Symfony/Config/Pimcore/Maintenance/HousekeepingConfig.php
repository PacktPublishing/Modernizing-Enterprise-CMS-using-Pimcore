<?php

namespace Symfony\Config\Pimcore\Maintenance;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class HousekeepingConfig 
{
    private $cleanupTmpFilesAtimeOlderThan;
    private $cleanupProfilerFilesAtimeOlderThan;
    
    /**
     * @default 7776000
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function cleanupTmpFilesAtimeOlderThan($value): self
    {
        $this->cleanupTmpFilesAtimeOlderThan = $value;
    
        return $this;
    }
    
    /**
     * @default 1800
     * @param ParamConfigurator|int $value
     * @return $this
     */
    public function cleanupProfilerFilesAtimeOlderThan($value): self
    {
        $this->cleanupProfilerFilesAtimeOlderThan = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['cleanup_tmp_files_atime_older_than'])) {
            $this->cleanupTmpFilesAtimeOlderThan = $value['cleanup_tmp_files_atime_older_than'];
            unset($value['cleanup_tmp_files_atime_older_than']);
        }
    
        if (isset($value['cleanup_profiler_files_atime_older_than'])) {
            $this->cleanupProfilerFilesAtimeOlderThan = $value['cleanup_profiler_files_atime_older_than'];
            unset($value['cleanup_profiler_files_atime_older_than']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->cleanupTmpFilesAtimeOlderThan) {
            $output['cleanup_tmp_files_atime_older_than'] = $this->cleanupTmpFilesAtimeOlderThan;
        }
        if (null !== $this->cleanupProfilerFilesAtimeOlderThan) {
            $output['cleanup_profiler_files_atime_older_than'] = $this->cleanupProfilerFilesAtimeOlderThan;
        }
    
        return $output;
    }
    

}
