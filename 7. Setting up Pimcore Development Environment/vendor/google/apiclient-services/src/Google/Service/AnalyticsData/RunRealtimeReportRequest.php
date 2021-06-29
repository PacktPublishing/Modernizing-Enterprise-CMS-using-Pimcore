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

class Google_Service_AnalyticsData_RunRealtimeReportRequest extends Google_Collection
{
  protected $collection_key = 'orderBys';
  protected $dimensionFilterType = 'Google_Service_AnalyticsData_FilterExpression';
  protected $dimensionFilterDataType = '';
  protected $dimensionsType = 'Google_Service_AnalyticsData_Dimension';
  protected $dimensionsDataType = 'array';
  public $limit;
  public $metricAggregations;
  protected $metricFilterType = 'Google_Service_AnalyticsData_FilterExpression';
  protected $metricFilterDataType = '';
  protected $metricsType = 'Google_Service_AnalyticsData_Metric';
  protected $metricsDataType = 'array';
  protected $orderBysType = 'Google_Service_AnalyticsData_OrderBy';
  protected $orderBysDataType = 'array';
  public $returnPropertyQuota;

  /**
   * @param Google_Service_AnalyticsData_FilterExpression
   */
  public function setDimensionFilter(Google_Service_AnalyticsData_FilterExpression $dimensionFilter)
  {
    $this->dimensionFilter = $dimensionFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_FilterExpression
   */
  public function getDimensionFilter()
  {
    return $this->dimensionFilter;
  }
  /**
   * @param Google_Service_AnalyticsData_Dimension[]
   */
  public function setDimensions($dimensions)
  {
    $this->dimensions = $dimensions;
  }
  /**
   * @return Google_Service_AnalyticsData_Dimension[]
   */
  public function getDimensions()
  {
    return $this->dimensions;
  }
  public function setLimit($limit)
  {
    $this->limit = $limit;
  }
  public function getLimit()
  {
    return $this->limit;
  }
  public function setMetricAggregations($metricAggregations)
  {
    $this->metricAggregations = $metricAggregations;
  }
  public function getMetricAggregations()
  {
    return $this->metricAggregations;
  }
  /**
   * @param Google_Service_AnalyticsData_FilterExpression
   */
  public function setMetricFilter(Google_Service_AnalyticsData_FilterExpression $metricFilter)
  {
    $this->metricFilter = $metricFilter;
  }
  /**
   * @return Google_Service_AnalyticsData_FilterExpression
   */
  public function getMetricFilter()
  {
    return $this->metricFilter;
  }
  /**
   * @param Google_Service_AnalyticsData_Metric[]
   */
  public function setMetrics($metrics)
  {
    $this->metrics = $metrics;
  }
  /**
   * @return Google_Service_AnalyticsData_Metric[]
   */
  public function getMetrics()
  {
    return $this->metrics;
  }
  /**
   * @param Google_Service_AnalyticsData_OrderBy[]
   */
  public function setOrderBys($orderBys)
  {
    $this->orderBys = $orderBys;
  }
  /**
   * @return Google_Service_AnalyticsData_OrderBy[]
   */
  public function getOrderBys()
  {
    return $this->orderBys;
  }
  public function setReturnPropertyQuota($returnPropertyQuota)
  {
    $this->returnPropertyQuota = $returnPropertyQuota;
  }
  public function getReturnPropertyQuota()
  {
    return $this->returnPropertyQuota;
  }
}
