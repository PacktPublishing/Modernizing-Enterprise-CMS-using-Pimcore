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

class Google_Service_Testing_IosTestSetup extends Google_Collection
{
  protected $collection_key = 'pushFiles';
  protected $additionalIpasType = 'Google_Service_Testing_FileReference';
  protected $additionalIpasDataType = 'array';
  public $networkProfile;
  protected $pullDirectoriesType = 'Google_Service_Testing_IosDeviceFile';
  protected $pullDirectoriesDataType = 'array';
  protected $pushFilesType = 'Google_Service_Testing_IosDeviceFile';
  protected $pushFilesDataType = 'array';

  /**
   * @param Google_Service_Testing_FileReference[]
   */
  public function setAdditionalIpas($additionalIpas)
  {
    $this->additionalIpas = $additionalIpas;
  }
  /**
   * @return Google_Service_Testing_FileReference[]
   */
  public function getAdditionalIpas()
  {
    return $this->additionalIpas;
  }
  public function setNetworkProfile($networkProfile)
  {
    $this->networkProfile = $networkProfile;
  }
  public function getNetworkProfile()
  {
    return $this->networkProfile;
  }
  /**
   * @param Google_Service_Testing_IosDeviceFile[]
   */
  public function setPullDirectories($pullDirectories)
  {
    $this->pullDirectories = $pullDirectories;
  }
  /**
   * @return Google_Service_Testing_IosDeviceFile[]
   */
  public function getPullDirectories()
  {
    return $this->pullDirectories;
  }
  /**
   * @param Google_Service_Testing_IosDeviceFile[]
   */
  public function setPushFiles($pushFiles)
  {
    $this->pushFiles = $pushFiles;
  }
  /**
   * @return Google_Service_Testing_IosDeviceFile[]
   */
  public function getPushFiles()
  {
    return $this->pushFiles;
  }
}
