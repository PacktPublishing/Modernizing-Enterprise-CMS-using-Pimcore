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

class Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1Version extends Google_Collection
{
  protected $collection_key = 'packageUris';
  protected $acceleratorConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig';
  protected $acceleratorConfigDataType = '';
  protected $autoScalingType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutoScaling';
  protected $autoScalingDataType = '';
  protected $containerType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerSpec';
  protected $containerDataType = '';
  public $createTime;
  public $deploymentUri;
  public $description;
  public $errorMessage;
  public $etag;
  protected $explanationConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ExplanationConfig';
  protected $explanationConfigDataType = '';
  public $framework;
  public $isDefault;
  public $labels;
  public $lastMigrationModelId;
  public $lastMigrationTime;
  public $lastUseTime;
  public $machineType;
  protected $manualScalingType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ManualScaling';
  protected $manualScalingDataType = '';
  public $name;
  public $packageUris;
  public $predictionClass;
  public $pythonVersion;
  protected $requestLoggingConfigType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RequestLoggingConfig';
  protected $requestLoggingConfigDataType = '';
  protected $routesType = 'Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RouteMap';
  protected $routesDataType = '';
  public $runtimeVersion;
  public $serviceAccount;
  public $state;

  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig
   */
  public function setAcceleratorConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig $acceleratorConfig)
  {
    $this->acceleratorConfig = $acceleratorConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AcceleratorConfig
   */
  public function getAcceleratorConfig()
  {
    return $this->acceleratorConfig;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutoScaling
   */
  public function setAutoScaling(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutoScaling $autoScaling)
  {
    $this->autoScaling = $autoScaling;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1AutoScaling
   */
  public function getAutoScaling()
  {
    return $this->autoScaling;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerSpec
   */
  public function setContainer(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerSpec $container)
  {
    $this->container = $container;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ContainerSpec
   */
  public function getContainer()
  {
    return $this->container;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDeploymentUri($deploymentUri)
  {
    $this->deploymentUri = $deploymentUri;
  }
  public function getDeploymentUri()
  {
    return $this->deploymentUri;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setErrorMessage($errorMessage)
  {
    $this->errorMessage = $errorMessage;
  }
  public function getErrorMessage()
  {
    return $this->errorMessage;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ExplanationConfig
   */
  public function setExplanationConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ExplanationConfig $explanationConfig)
  {
    $this->explanationConfig = $explanationConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ExplanationConfig
   */
  public function getExplanationConfig()
  {
    return $this->explanationConfig;
  }
  public function setFramework($framework)
  {
    $this->framework = $framework;
  }
  public function getFramework()
  {
    return $this->framework;
  }
  public function setIsDefault($isDefault)
  {
    $this->isDefault = $isDefault;
  }
  public function getIsDefault()
  {
    return $this->isDefault;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setLastMigrationModelId($lastMigrationModelId)
  {
    $this->lastMigrationModelId = $lastMigrationModelId;
  }
  public function getLastMigrationModelId()
  {
    return $this->lastMigrationModelId;
  }
  public function setLastMigrationTime($lastMigrationTime)
  {
    $this->lastMigrationTime = $lastMigrationTime;
  }
  public function getLastMigrationTime()
  {
    return $this->lastMigrationTime;
  }
  public function setLastUseTime($lastUseTime)
  {
    $this->lastUseTime = $lastUseTime;
  }
  public function getLastUseTime()
  {
    return $this->lastUseTime;
  }
  public function setMachineType($machineType)
  {
    $this->machineType = $machineType;
  }
  public function getMachineType()
  {
    return $this->machineType;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ManualScaling
   */
  public function setManualScaling(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ManualScaling $manualScaling)
  {
    $this->manualScaling = $manualScaling;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1ManualScaling
   */
  public function getManualScaling()
  {
    return $this->manualScaling;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPackageUris($packageUris)
  {
    $this->packageUris = $packageUris;
  }
  public function getPackageUris()
  {
    return $this->packageUris;
  }
  public function setPredictionClass($predictionClass)
  {
    $this->predictionClass = $predictionClass;
  }
  public function getPredictionClass()
  {
    return $this->predictionClass;
  }
  public function setPythonVersion($pythonVersion)
  {
    $this->pythonVersion = $pythonVersion;
  }
  public function getPythonVersion()
  {
    return $this->pythonVersion;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RequestLoggingConfig
   */
  public function setRequestLoggingConfig(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RequestLoggingConfig $requestLoggingConfig)
  {
    $this->requestLoggingConfig = $requestLoggingConfig;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RequestLoggingConfig
   */
  public function getRequestLoggingConfig()
  {
    return $this->requestLoggingConfig;
  }
  /**
   * @param Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RouteMap
   */
  public function setRoutes(Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RouteMap $routes)
  {
    $this->routes = $routes;
  }
  /**
   * @return Google_Service_CloudMachineLearningEngine_GoogleCloudMlV1RouteMap
   */
  public function getRoutes()
  {
    return $this->routes;
  }
  public function setRuntimeVersion($runtimeVersion)
  {
    $this->runtimeVersion = $runtimeVersion;
  }
  public function getRuntimeVersion()
  {
    return $this->runtimeVersion;
  }
  public function setServiceAccount($serviceAccount)
  {
    $this->serviceAccount = $serviceAccount;
  }
  public function getServiceAccount()
  {
    return $this->serviceAccount;
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
