<?php

namespace Symfony\Config\PimcoreAdmin;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Assets'.\DIRECTORY_SEPARATOR.'NotesEventsConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class AssetsConfig 
{
    private $notesEvents;
    
    public function notesEvents(array $value = []): \Symfony\Config\PimcoreAdmin\Assets\NotesEventsConfig
    {
        if (null === $this->notesEvents) {
            $this->notesEvents = new \Symfony\Config\PimcoreAdmin\Assets\NotesEventsConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "notesEvents()" has already been initialized. You cannot pass values the second time you call notesEvents().');
        }
    
        return $this->notesEvents;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['notes_events'])) {
            $this->notesEvents = new \Symfony\Config\PimcoreAdmin\Assets\NotesEventsConfig($value['notes_events']);
            unset($value['notes_events']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->notesEvents) {
            $output['notes_events'] = $this->notesEvents->toArray();
        }
    
        return $output;
    }
    

}
