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
 * The "repricingreports" collection of methods.
 * Typical usage is:
 *  <code>
 *   $contentService = new Google_Service_ShoppingContent(...);
 *   $repricingreports = $contentService->repricingreports;
 *  </code>
 */
class Google_Service_ShoppingContent_Resource_RepricingrulesRepricingreports extends Google_Service_Resource
{
  /**
   * Lists the metrics report for a given Repricing rule. Reports of the last 3
   * days may not be complete.
   * (repricingreports.listRepricingrulesRepricingreports)
   *
   * @param string $merchantId Required. Id of the merchant who owns the Repricing
   * rule.
   * @param string $ruleId Required. Id of the Repricing rule.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string endDate Gets Repricing reports on and before this date in
   * the merchant's timezone. You can only retrieve data up to 3 days ago
   * (default) or earlier. Format: YYYY-MM-DD.
   * @opt_param int pageSize Maximum number of daily reports to return. Each
   * report includes data from a single 24-hour period. The page size defaults to
   * 50 and values above 1000 are coerced to 1000. This service may return fewer
   * days than this value, for example, if the time between your start and end
   * date is less than page size.
   * @opt_param string pageToken Token (if provided) to retrieve the subsequent
   * page. All other parameters must match the original call that provided the
   * page token.
   * @opt_param string startDate Gets Repricing reports on and after this date in
   * the merchant's timezone, up to one year ago. Do not use a start date later
   * than 3 days ago (default). Format: YYYY-MM-DD.
   * @return Google_Service_ShoppingContent_ListRepricingRuleReportsResponse
   */
  public function listRepricingrulesRepricingreports($merchantId, $ruleId, $optParams = array())
  {
    $params = array('merchantId' => $merchantId, 'ruleId' => $ruleId);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_ShoppingContent_ListRepricingRuleReportsResponse");
  }
}
