<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

class Google_Service_Networkconnectivity_Operation extends Google_Collection
{
  protected $collection_key = 'traceSpans';
  public $consumerId;
  public $endTime;
  public $extensions;
  public $importance;
  public $labels;
  protected $logEntriesType = 'Google_Service_Networkconnectivity_LogEntry';
  protected $logEntriesDataType = 'array';
  protected $metricValueSetsType = 'Google_Service_Networkconnectivity_MetricValueSet';
  protected $metricValueSetsDataType = 'array';
  public $operationId;
  public $operationName;
  protected $quotaPropertiesType = 'Google_Service_Networkconnectivity_QuotaProperties';
  protected $quotaPropertiesDataType = '';
  protected $resourcesType = 'Google_Service_Networkconnectivity_ResourceInfo';
  protected $resourcesDataType = 'array';
  public $startTime;
  protected $traceSpansType = 'Google_Service_Networkconnectivity_TraceSpan';
  protected $traceSpansDataType = 'array';
  public $userLabels;

  public function setConsumerId($consumerId)
  {
    $this->consumerId = $consumerId;
  }
  public function getConsumerId()
  {
    return $this->consumerId;
  }
  public function setEndTime($endTime)
  {
    $this->endTime = $endTime;
  }
  public function getEndTime()
  {
    return $this->endTime;
  }
  public function setExtensions($extensions)
  {
    $this->extensions = $extensions;
  }
  public function getExtensions()
  {
    return $this->extensions;
  }
  public function setImportance($importance)
  {
    $this->importance = $importance;
  }
  public function getImportance()
  {
    return $this->importance;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  /**
   * @param Google_Service_Networkconnectivity_LogEntry[]
   */
  public function setLogEntries($logEntries)
  {
    $this->logEntries = $logEntries;
  }
  /**
   * @return Google_Service_Networkconnectivity_LogEntry[]
   */
  public function getLogEntries()
  {
    return $this->logEntries;
  }
  /**
   * @param Google_Service_Networkconnectivity_MetricValueSet[]
   */
  public function setMetricValueSets($metricValueSets)
  {
    $this->metricValueSets = $metricValueSets;
  }
  /**
   * @return Google_Service_Networkconnectivity_MetricValueSet[]
   */
  public function getMetricValueSets()
  {
    return $this->metricValueSets;
  }
  public function setOperationId($operationId)
  {
    $this->operationId = $operationId;
  }
  public function getOperationId()
  {
    return $this->operationId;
  }
  public function setOperationName($operationName)
  {
    $this->operationName = $operationName;
  }
  public function getOperationName()
  {
    return $this->operationName;
  }
  /**
   * @param Google_Service_Networkconnectivity_QuotaProperties
   */
  public function setQuotaProperties(Google_Service_Networkconnectivity_QuotaProperties $quotaProperties)
  {
    $this->quotaProperties = $quotaProperties;
  }
  /**
   * @return Google_Service_Networkconnectivity_QuotaProperties
   */
  public function getQuotaProperties()
  {
    return $this->quotaProperties;
  }
  /**
   * @param Google_Service_Networkconnectivity_ResourceInfo[]
   */
  public function setResources($resources)
  {
    $this->resources = $resources;
  }
  /**
   * @return Google_Service_Networkconnectivity_ResourceInfo[]
   */
  public function getResources()
  {
    return $this->resources;
  }
  public function setStartTime($startTime)
  {
    $this->startTime = $startTime;
  }
  public function getStartTime()
  {
    return $this->startTime;
  }
  /**
   * @param Google_Service_Networkconnectivity_TraceSpan[]
   */
  public function setTraceSpans($traceSpans)
  {
    $this->traceSpans = $traceSpans;
  }
  /**
   * @return Google_Service_Networkconnectivity_TraceSpan[]
   */
  public function getTraceSpans()
  {
    return $this->traceSpans;
  }
  public function setUserLabels($userLabels)
  {
    $this->userLabels = $userLabels;
  }
  public function getUserLabels()
  {
    return $this->userLabels;
  }
}
