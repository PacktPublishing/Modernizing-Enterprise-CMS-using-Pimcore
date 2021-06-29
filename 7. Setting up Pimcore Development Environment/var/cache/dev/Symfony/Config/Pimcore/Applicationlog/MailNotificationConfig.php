<?php

namespace Symfony\Config\Pimcore\Applicationlog;


use Symfony\Component\Config\Loader\ParamConfigurator;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;


/**
 * This class is automatically generated to help creating config.
 *
 * @experimental in 5.3
 */
class MailNotificationConfig 
{
    private $sendLogSummary;
    private $filterPriority;
    private $mailReceiver;
    
    /**
     * Send log summary via email
     * @default false
     * @param ParamConfigurator|bool $value
     * @return $this
     */
    public function sendLogSummary($value): self
    {
        $this->sendLogSummary = $value;
    
        return $this;
    }
    
    /**
     * Filter threshold for email summary, choose one of: 7 (debug), 6 (info), 5 (notice), 4 (warning), 3 (error), 2 (critical), 1 (alert) ,0 (emerg)
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function filterPriority($value): self
    {
        $this->filterPriority = $value;
    
        return $this;
    }
    
    /**
     * Log summary receivers. Separate multiple email receivers by using ;
     * @default null
     * @param ParamConfigurator|mixed $value
     * @return $this
     */
    public function mailReceiver($value): self
    {
        $this->mailReceiver = $value;
    
        return $this;
    }
    
    public function __construct(array $value = [])
    {
    
        if (isset($value['send_log_summary'])) {
            $this->sendLogSummary = $value['send_log_summary'];
            unset($value['send_log_summary']);
        }
    
        if (isset($value['filter_priority'])) {
            $this->filterPriority = $value['filter_priority'];
            unset($value['filter_priority']);
        }
    
        if (isset($value['mail_receiver'])) {
            $this->mailReceiver = $value['mail_receiver'];
            unset($value['mail_receiver']);
        }
    
        if ([] !== $value) {
            throw new InvalidConfigurationException(sprintf('The following keys are not supported by "%s": ', __CLASS__).implode(', ', array_keys($value)));
        }
    }
    
    
    public function toArray(): array
    {
        $output = [];
        if (null !== $this->sendLogSummary) {
            $output['send_log_summary'] = $this->sendLogSummary;
        }
        if (null !== $this->filterPriority) {
            $output['filter_priority'] = $this->filterPriority;
        }
        if (null !== $this->mailReceiver) {
            $output['mail_receiver'] = $this->mailReceiver;
        }
    
        return $output;
    }
    

}
