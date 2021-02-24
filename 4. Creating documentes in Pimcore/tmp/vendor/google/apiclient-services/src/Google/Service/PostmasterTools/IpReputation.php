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

class Google_Service_PostmasterTools_IpReputation extends Google_Collection
{
  protected $collection_key = 'sampleIps';
  public $ipCount;
  public $reputation;
  public $sampleIps;

  public function setIpCount($ipCount)
  {
    $this->ipCount = $ipCount;
  }
  public function getIpCount()
  {
    return $this->ipCount;
  }
  public function setReputation($reputation)
  {
    $this->reputation = $reputation;
  }
  public function getReputation()
  {
    return $this->reputation;
  }
  public function setSampleIps($sampleIps)
  {
    $this->sampleIps = $sampleIps;
  }
  public function getSampleIps()
  {
    return $this->sampleIps;
  }
}
