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

class Google_Service_SASPortalTesting_SasPortalDevice extends Google_Collection
{
  protected $collection_key = 'grants';
  protected $activeConfigType = 'Google_Service_SASPortalTesting_SasPortalDeviceConfig';
  protected $activeConfigDataType = '';
  protected $deviceMetadataType = 'Google_Service_SASPortalTesting_SasPortalDeviceMetadata';
  protected $deviceMetadataDataType = '';
  public $displayName;
  public $fccId;
  protected $grantsType = 'Google_Service_SASPortalTesting_SasPortalDeviceGrant';
  protected $grantsDataType = 'array';
  public $name;
  protected $preloadedConfigType = 'Google_Service_SASPortalTesting_SasPortalDeviceConfig';
  protected $preloadedConfigDataType = '';
  public $serialNumber;
  public $state;

  /**
   * @param Google_Service_SASPortalTesting_SasPortalDeviceConfig
   */
  public function setActiveConfig(Google_Service_SASPortalTesting_SasPortalDeviceConfig $activeConfig)
  {
    $this->activeConfig = $activeConfig;
  }
  /**
   * @return Google_Service_SASPortalTesting_SasPortalDeviceConfig
   */
  public function getActiveConfig()
  {
    return $this->activeConfig;
  }
  /**
   * @param Google_Service_SASPortalTesting_SasPortalDeviceMetadata
   */
  public function setDeviceMetadata(Google_Service_SASPortalTesting_SasPortalDeviceMetadata $deviceMetadata)
  {
    $this->deviceMetadata = $deviceMetadata;
  }
  /**
   * @return Google_Service_SASPortalTesting_SasPortalDeviceMetadata
   */
  public function getDeviceMetadata()
  {
    return $this->deviceMetadata;
  }
  public function setDisplayName($displayName)
  {
    $this->displayName = $displayName;
  }
  public function getDisplayName()
  {
    return $this->displayName;
  }
  public function setFccId($fccId)
  {
    $this->fccId = $fccId;
  }
  public function getFccId()
  {
    return $this->fccId;
  }
  /**
   * @param Google_Service_SASPortalTesting_SasPortalDeviceGrant[]
   */
  public function setGrants($grants)
  {
    $this->grants = $grants;
  }
  /**
   * @return Google_Service_SASPortalTesting_SasPortalDeviceGrant[]
   */
  public function getGrants()
  {
    return $this->grants;
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
   * @param Google_Service_SASPortalTesting_SasPortalDeviceConfig
   */
  public function setPreloadedConfig(Google_Service_SASPortalTesting_SasPortalDeviceConfig $preloadedConfig)
  {
    $this->preloadedConfig = $preloadedConfig;
  }
  /**
   * @return Google_Service_SASPortalTesting_SasPortalDeviceConfig
   */
  public function getPreloadedConfig()
  {
    return $this->preloadedConfig;
  }
  public function setSerialNumber($serialNumber)
  {
    $this->serialNumber = $serialNumber;
  }
  public function getSerialNumber()
  {
    return $this->serialNumber;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
}
