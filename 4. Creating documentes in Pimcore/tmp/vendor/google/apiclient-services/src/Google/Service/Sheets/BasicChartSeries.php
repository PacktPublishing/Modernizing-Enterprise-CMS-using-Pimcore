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

class Google_Service_Sheets_BasicChartSeries extends Google_Collection
{
  protected $collection_key = 'styleOverrides';
  protected $colorType = 'Google_Service_Sheets_Color';
  protected $colorDataType = '';
  protected $colorStyleType = 'Google_Service_Sheets_ColorStyle';
  protected $colorStyleDataType = '';
  protected $dataLabelType = 'Google_Service_Sheets_DataLabel';
  protected $dataLabelDataType = '';
  protected $lineStyleType = 'Google_Service_Sheets_LineStyle';
  protected $lineStyleDataType = '';
  protected $pointStyleType = 'Google_Service_Sheets_PointStyle';
  protected $pointStyleDataType = '';
  protected $seriesType = 'Google_Service_Sheets_ChartData';
  protected $seriesDataType = '';
  protected $styleOverridesType = 'Google_Service_Sheets_BasicSeriesDataPointStyleOverride';
  protected $styleOverridesDataType = 'array';
  public $targetAxis;
  public $type;

  /**
   * @param Google_Service_Sheets_Color
   */
  public function setColor(Google_Service_Sheets_Color $color)
  {
    $this->color = $color;
  }
  /**
   * @return Google_Service_Sheets_Color
   */
  public function getColor()
  {
    return $this->color;
  }
  /**
   * @param Google_Service_Sheets_ColorStyle
   */
  public function setColorStyle(Google_Service_Sheets_ColorStyle $colorStyle)
  {
    $this->colorStyle = $colorStyle;
  }
  /**
   * @return Google_Service_Sheets_ColorStyle
   */
  public function getColorStyle()
  {
    return $this->colorStyle;
  }
  /**
   * @param Google_Service_Sheets_DataLabel
   */
  public function setDataLabel(Google_Service_Sheets_DataLabel $dataLabel)
  {
    $this->dataLabel = $dataLabel;
  }
  /**
   * @return Google_Service_Sheets_DataLabel
   */
  public function getDataLabel()
  {
    return $this->dataLabel;
  }
  /**
   * @param Google_Service_Sheets_LineStyle
   */
  public function setLineStyle(Google_Service_Sheets_LineStyle $lineStyle)
  {
    $this->lineStyle = $lineStyle;
  }
  /**
   * @return Google_Service_Sheets_LineStyle
   */
  public function getLineStyle()
  {
    return $this->lineStyle;
  }
  /**
   * @param Google_Service_Sheets_PointStyle
   */
  public function setPointStyle(Google_Service_Sheets_PointStyle $pointStyle)
  {
    $this->pointStyle = $pointStyle;
  }
  /**
   * @return Google_Service_Sheets_PointStyle
   */
  public function getPointStyle()
  {
    return $this->pointStyle;
  }
  /**
   * @param Google_Service_Sheets_ChartData
   */
  public function setSeries(Google_Service_Sheets_ChartData $series)
  {
    $this->series = $series;
  }
  /**
   * @return Google_Service_Sheets_ChartData
   */
  public function getSeries()
  {
    return $this->series;
  }
  /**
   * @param Google_Service_Sheets_BasicSeriesDataPointStyleOverride[]
   */
  public function setStyleOverrides($styleOverrides)
  {
    $this->styleOverrides = $styleOverrides;
  }
  /**
   * @return Google_Service_Sheets_BasicSeriesDataPointStyleOverride[]
   */
  public function getStyleOverrides()
  {
    return $this->styleOverrides;
  }
  public function setTargetAxis($targetAxis)
  {
    $this->targetAxis = $targetAxis;
  }
  public function getTargetAxis()
  {
    return $this->targetAxis;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}
