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

class Google_Service_Cloudchannel_GoogleCloudChannelV1Sku extends Google_Model
{
  protected $marketingInfoType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo';
  protected $marketingInfoDataType = '';
  public $name;
  protected $productType = 'Google_Service_Cloudchannel_GoogleCloudChannelV1Product';
  protected $productDataType = '';

  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo
   */
  public function setMarketingInfo(Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo $marketingInfo)
  {
    $this->marketingInfo = $marketingInfo;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1MarketingInfo
   */
  public function getMarketingInfo()
  {
    return $this->marketingInfo;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Google_Service_Cloudchannel_GoogleCloudChannelV1Product
   */
  public function setProduct(Google_Service_Cloudchannel_GoogleCloudChannelV1Product $product)
  {
    $this->product = $product;
  }
  /**
   * @return Google_Service_Cloudchannel_GoogleCloudChannelV1Product
   */
  public function getProduct()
  {
    return $this->product;
  }
}
