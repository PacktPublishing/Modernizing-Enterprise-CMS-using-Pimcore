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

class Google_Service_Games_SnapshotMetadata extends Google_Model
{
  public $description;
  public $deviceName;
  public $gameplayDuration;
  public $lastModifyTime;
  public $progressValue;

  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setDeviceName($deviceName)
  {
    $this->deviceName = $deviceName;
  }
  public function getDeviceName()
  {
    return $this->deviceName;
  }
  public function setGameplayDuration($gameplayDuration)
  {
    $this->gameplayDuration = $gameplayDuration;
  }
  public function getGameplayDuration()
  {
    return $this->gameplayDuration;
  }
  public function setLastModifyTime($lastModifyTime)
  {
    $this->lastModifyTime = $lastModifyTime;
  }
  public function getLastModifyTime()
  {
    return $this->lastModifyTime;
  }
  public function setProgressValue($progressValue)
  {
    $this->progressValue = $progressValue;
  }
  public function getProgressValue()
  {
    return $this->progressValue;
  }
}
