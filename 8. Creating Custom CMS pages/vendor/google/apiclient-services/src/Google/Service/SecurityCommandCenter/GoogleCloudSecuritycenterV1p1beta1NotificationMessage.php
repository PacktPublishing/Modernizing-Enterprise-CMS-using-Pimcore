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

class Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1NotificationMessage extends Google_Model
{
  protected $findingType = 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Finding';
  protected $findingDataType = '';
  public $notificationConfigName;
  protected $resourceType = 'Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Resource';
  protected $resourceDataType = '';

  /**
   * @param Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Finding
   */
  public function setFinding(Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Finding $finding)
  {
    $this->finding = $finding;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Finding
   */
  public function getFinding()
  {
    return $this->finding;
  }
  public function setNotificationConfigName($notificationConfigName)
  {
    $this->notificationConfigName = $notificationConfigName;
  }
  public function getNotificationConfigName()
  {
    return $this->notificationConfigName;
  }
  /**
   * @param Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Resource
   */
  public function setResource(Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Resource $resource)
  {
    $this->resource = $resource;
  }
  /**
   * @return Google_Service_SecurityCommandCenter_GoogleCloudSecuritycenterV1p1beta1Resource
   */
  public function getResource()
  {
    return $this->resource;
  }
}
