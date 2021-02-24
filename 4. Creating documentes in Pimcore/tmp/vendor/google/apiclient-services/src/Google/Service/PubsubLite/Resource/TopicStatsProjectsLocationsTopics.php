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

/**
 * The "topics" collection of methods.
 * Typical usage is:
 *  <code>
 *   $pubsubliteService = new Google_Service_PubsubLite(...);
 *   $topics = $pubsubliteService->topics;
 *  </code>
 */
class Google_Service_PubsubLite_Resource_TopicStatsProjectsLocationsTopics extends Google_Service_Resource
{
  /**
   * Compute statistics about a range of messages in a given topic and partition.
   * (topics.computeMessageStats)
   *
   * @param string $topic Required. The topic for which we should compute message
   * stats.
   * @param Google_Service_PubsubLite_ComputeMessageStatsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_PubsubLite_ComputeMessageStatsResponse
   */
  public function computeMessageStats($topic, Google_Service_PubsubLite_ComputeMessageStatsRequest $postBody, $optParams = array())
  {
    $params = array('topic' => $topic, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('computeMessageStats', array($params), "Google_Service_PubsubLite_ComputeMessageStatsResponse");
  }
}
