<?php

namespace Symfony\Config\Pimcore;

require_once __DIR__.\DIRECTORY_SEPARATOR.'Applicationlog'.\DIRECTORY_SEPARATOR.'MailNotificationConfig.php';

use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
use Symfony\Component\Config\Loader\ParamConfigurator;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class ApplicationlogConfig 
{
    private $mailNotification;
    private $archiveTreshold;
    private $archiveAlternativeDatabase;
    private $deleteArchiveThreshold;
    
    public function mailNotification(array $value = []): \Symfony\Config\Pimcore\Applicationlog\MailNotificationConfig
    {
        if (null === $this->mailNotification) {
            $this->mailNotification = new \Symfony\Config\Pimcore\Applicationlog\MailNotificationConfig($value);
        } elseif ([] !== $value) {
            throw new InvalidConfigurationException('The node created by "mailNotification()" has already been initialized. You cannot pass values the second time you call mailNotification().');
        }
    
        return $this->mailNotification;
    }
    
    /**
     * Archive threshold in days
     * @default 30
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function archiveTreshold($value): self
    {
        $this->archiveTreshold = $value;
    
        return $this;
    }
    
    /**
     * Archive database name (optional). Tables will get archived to a different database, recommended when huge amounts of logs will be generated
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function archiveAlternativeDatabase($value): self
    {
        $this->archiveAlternativeDatabase = $value;
    
        return $this;
    }
    
    /**
     * Threshold for deleting application log archive tables (in months)
     * @default '6'
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function deleteArchiveThreshold($value): self
    {
        $this->deleteArchiveThreshold = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['mail_notification'])) {
            $this->mailNotification = new \Symfony\Config\Pimcore\Applicationlog\MailNotificationConfig($value['mail_notification']);
            unset($value['mail_notification']);
        }
    
        if (isset($value['archive_treshold'])) {
            $this->archiveTreshold = $value['archive_treshold'];
            unset($value['archive_treshold']);
        }
    
        if (isset($value['archive_alternative_database'])) {
            $this->archiveAlternativeDatabase = $value['archive_alternative_database'];
            unset($value['archive_alternative_database']);
        }
    
        if (isset($value['delete_archive_threshold'])) {
            $this->deleteArchiveThreshold = $value['delete_archive_threshold'];
            unset($value['delete_archive_threshold']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->mailNotification) {
            $output['mail_notification'] = $this->mailNotification->toArray();
        }
        if (null !== $this->archiveTreshold) {
            $output['archive_treshold'] = $this->archiveTreshold;
        }
        if (null !== $this->archiveAlternativeDatabase) {
            $output['archive_alternative_database'] = $this->archiveAlternativeDatabase;
        }
        if (null !== $this->deleteArchiveThreshold) {
            $output['delete_archive_threshold'] = $this->deleteArchiveThreshold;
        }
    
        return $output;
    }
    

}
