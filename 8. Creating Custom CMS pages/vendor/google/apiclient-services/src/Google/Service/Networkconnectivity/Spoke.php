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

class Google_Service_Networkconnectivity_Spoke extends Google_Collection
{
  protected $collection_key = 'linkedVpnTunnels';
  public $createTime;
  public $description;
  public $hub;
  public $labels;
  public $linkedInterconnectAttachments;
  protected $linkedRouterApplianceInstancesType = 'Google_Service_Networkconnectivity_RouterApplianceInstance';
  protected $linkedRouterApplianceInstancesDataType = 'array';
  public $linkedVpnTunnels;
  public $name;
  public $state;
  public $uniqueId;
  public $updateTime;

  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setHub($hub)
  {
    $this->hub = $hub;
  }
  public function getHub()
  {
    return $this->hub;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLinkedInterconnectAttachments($linkedInterconnectAttachments)
  {
    $this->linkedInterconnectAttachments = $linkedInterconnectAttachments;
  }
  public function getLinkedInterconnectAttachments()
  {
    return $this->linkedInterconnectAttachments;
  }
  /**
   * @param Google_Service_Networkconnectivity_RouterApplianceInstance[]
   */
  public function setLinkedRouterApplianceInstances($linkedRouterApplianceInstances)
  {
    $this->linkedRouterApplianceInstances = $linkedRouterApplianceInstances;
  }
  /**
   * @return Google_Service_Networkconnectivity_RouterApplianceInstance[]
   */
  public function getLinkedRouterApplianceInstances()
  {
    return $this->linkedRouterApplianceInstances;
  }
  public function setLinkedVpnTunnels($linkedVpnTunnels)
  {
    $this->linkedVpnTunnels = $linkedVpnTunnels;
  }
  public function getLinkedVpnTunnels()
  {
    return $this->linkedVpnTunnels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setUniqueId($uniqueId)
  {
    $this->uniqueId = $uniqueId;
  }
  public function getUniqueId()
  {
    return $this->uniqueId;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}
