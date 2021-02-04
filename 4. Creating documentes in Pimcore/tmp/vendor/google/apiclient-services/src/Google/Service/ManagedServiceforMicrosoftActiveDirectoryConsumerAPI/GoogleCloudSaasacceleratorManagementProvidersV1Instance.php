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

class Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1Instance extends Google_Collection
{
  protected $collection_key = 'provisionedResources';
  public $consumerDefinedName;
  public $createTime;
  public $labels;
  public $maintenancePolicyNames;
  protected $maintenanceSchedulesType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSchedule';
  protected $maintenanceSchedulesDataType = 'map';
  protected $maintenanceSettingsType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSettings';
  protected $maintenanceSettingsDataType = '';
  public $name;
  public $producerMetadata;
  protected $provisionedResourcesType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1ProvisionedResource';
  protected $provisionedResourcesDataType = 'array';
  public $slmInstanceTemplate;
  protected $sloMetadataType = 'Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloMetadata';
  protected $sloMetadataDataType = '';
  public $softwareVersions;
  public $state;
  public $tenantProjectId;
  public $updateTime;

  public function setConsumerDefinedName($consumerDefinedName)
  {
    $this->consumerDefinedName = $consumerDefinedName;
  }
  public function getConsumerDefinedName()
  {
    return $this->consumerDefinedName;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMaintenancePolicyNames($maintenancePolicyNames)
  {
    $this->maintenancePolicyNames = $maintenancePolicyNames;
  }
  public function getMaintenancePolicyNames()
  {
    return $this->maintenancePolicyNames;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSchedule[]
   */
  public function setMaintenanceSchedules($maintenanceSchedules)
  {
    $this->maintenanceSchedules = $maintenanceSchedules;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSchedule[]
   */
  public function getMaintenanceSchedules()
  {
    return $this->maintenanceSchedules;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSettings
   */
  public function setMaintenanceSettings(Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSettings $maintenanceSettings)
  {
    $this->maintenanceSettings = $maintenanceSettings;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1MaintenanceSettings
   */
  public function getMaintenanceSettings()
  {
    return $this->maintenanceSettings;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setProducerMetadata($producerMetadata)
  {
    $this->producerMetadata = $producerMetadata;
  }
  public function getProducerMetadata()
  {
    return $this->producerMetadata;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1ProvisionedResource[]
   */
  public function setProvisionedResources($provisionedResources)
  {
    $this->provisionedResources = $provisionedResources;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1ProvisionedResource[]
   */
  public function getProvisionedResources()
  {
    return $this->provisionedResources;
  }
  public function setSlmInstanceTemplate($slmInstanceTemplate)
  {
    $this->slmInstanceTemplate = $slmInstanceTemplate;
  }
  public function getSlmInstanceTemplate()
  {
    return $this->slmInstanceTemplate;
  }
  /**
   * @param Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloMetadata
   */
  public function setSloMetadata(Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloMetadata $sloMetadata)
  {
    $this->sloMetadata = $sloMetadata;
  }
  /**
   * @return Google_Service_ManagedServiceforMicrosoftActiveDirectoryConsumerAPI_GoogleCloudSaasacceleratorManagementProvidersV1SloMetadata
   */
  public function getSloMetadata()
  {
    return $this->sloMetadata;
  }
  public function setSoftwareVersions($softwareVersions)
  {
    $this->softwareVersions = $softwareVersions;
  }
  public function getSoftwareVersions()
  {
    return $this->softwareVersions;
  }
  public function setState($state)
  {
    $this->state = $state;
  }
  public function getState()
  {
    return $this->state;
  }
  public function setTenantProjectId($tenantProjectId)
  {
    $this->tenantProjectId = $tenantProjectId;
  }
  public function getTenantProjectId()
  {
    return $this->tenantProjectId;
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
