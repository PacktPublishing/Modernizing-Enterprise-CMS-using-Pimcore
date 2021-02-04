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

class Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageTable extends Google_Collection
{
  protected $collection_key = 'headerRows';
  protected $bodyRowsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageTableTableRow';
  protected $bodyRowsDataType = 'array';
  protected $detectedLanguagesType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageDetectedLanguage';
  protected $detectedLanguagesDataType = 'array';
  protected $headerRowsType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageTableTableRow';
  protected $headerRowsDataType = 'array';
  protected $layoutType = 'Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageLayout';
  protected $layoutDataType = '';

  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageTableTableRow[]
   */
  public function setBodyRows($bodyRows)
  {
    $this->bodyRows = $bodyRows;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageTableTableRow[]
   */
  public function getBodyRows()
  {
    return $this->bodyRows;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageDetectedLanguage[]
   */
  public function setDetectedLanguages($detectedLanguages)
  {
    $this->detectedLanguages = $detectedLanguages;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageDetectedLanguage[]
   */
  public function getDetectedLanguages()
  {
    return $this->detectedLanguages;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageTableTableRow[]
   */
  public function setHeaderRows($headerRows)
  {
    $this->headerRows = $headerRows;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageTableTableRow[]
   */
  public function getHeaderRows()
  {
    return $this->headerRows;
  }
  /**
   * @param Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageLayout
   */
  public function setLayout(Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageLayout $layout)
  {
    $this->layout = $layout;
  }
  /**
   * @return Google_Service_Document_GoogleCloudDocumentaiV1beta2DocumentPageLayout
   */
  public function getLayout()
  {
    return $this->layout;
  }
}
