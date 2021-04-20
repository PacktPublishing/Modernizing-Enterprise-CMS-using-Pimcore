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
 * The "dlpJobs" collection of methods.
 * Typical usage is:
 *  <code>
 *   $dlpService = new Google_Service_DLP(...);
 *   $dlpJobs = $dlpService->dlpJobs;
 *  </code>
 */
class Google_Service_DLP_Resource_ProjectsLocationsDlpJobs extends Google_Service_Resource
{
  /**
   * Starts asynchronous cancellation on a long-running DlpJob. The server makes a
   * best effort to cancel the DlpJob, but success is not guaranteed. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.cancel)
   *
   * @param string $name Required. The name of the DlpJob resource to be
   * cancelled.
   * @param Google_Service_DLP_GooglePrivacyDlpV2CancelDlpJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function cancel($name, Google_Service_DLP_GooglePrivacyDlpV2CancelDlpJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('cancel', array($params), "Google_Service_DLP_GoogleProtobufEmpty");
  }
  /**
   * Creates a new job to inspect storage or calculate risk metrics. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more. When
   * no InfoTypes or CustomInfoTypes are specified in inspect jobs, the system
   * will automatically choose what detectors to run. By default this may be all
   * types, but may change over time as detectors are updated. (dlpJobs.create)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param Google_Service_DLP_GooglePrivacyDlpV2CreateDlpJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2DlpJob
   */
  public function create($parent, Google_Service_DLP_GooglePrivacyDlpV2CreateDlpJobRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_DLP_GooglePrivacyDlpV2DlpJob");
  }
  /**
   * Deletes a long-running DlpJob. This method indicates that the client is no
   * longer interested in the DlpJob result. The job will be cancelled if
   * possible. See https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.delete)
   *
   * @param string $name Required. The name of the DlpJob resource to be deleted.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_DLP_GoogleProtobufEmpty");
  }
  /**
   * Finish a running hybrid DlpJob. Triggers the finalization steps and running
   * of any enabled actions that have not yet run. (dlpJobs.finish)
   *
   * @param string $name Required. The name of the DlpJob resource to be
   * cancelled.
   * @param Google_Service_DLP_GooglePrivacyDlpV2FinishDlpJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GoogleProtobufEmpty
   */
  public function finish($name, Google_Service_DLP_GooglePrivacyDlpV2FinishDlpJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('finish', array($params), "Google_Service_DLP_GoogleProtobufEmpty");
  }
  /**
   * Gets the latest state of a long-running DlpJob. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.get)
   *
   * @param string $name Required. The name of the DlpJob resource.
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2DlpJob
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_DLP_GooglePrivacyDlpV2DlpJob");
  }
  /**
   * Inspect hybrid content and store findings to a job. To review the findings,
   * inspect the job. Inspection will occur asynchronously.
   * (dlpJobs.hybridInspect)
   *
   * @param string $name Required. Resource name of the job to execute a hybrid
   * inspect on, for example `projects/dlp-test-project/dlpJob/53234423`.
   * @param Google_Service_DLP_GooglePrivacyDlpV2HybridInspectDlpJobRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_DLP_GooglePrivacyDlpV2HybridInspectResponse
   */
  public function hybridInspect($name, Google_Service_DLP_GooglePrivacyDlpV2HybridInspectDlpJobRequest $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('hybridInspect', array($params), "Google_Service_DLP_GooglePrivacyDlpV2HybridInspectResponse");
  }
  /**
   * Lists DlpJobs that match the specified filter in the request. See
   * https://cloud.google.com/dlp/docs/inspecting-storage and
   * https://cloud.google.com/dlp/docs/compute-risk-analysis to learn more.
   * (dlpJobs.listProjectsLocationsDlpJobs)
   *
   * @param string $parent Required. Parent resource name. The format of this
   * value varies depending on whether you have [specified a processing
   * location](https://cloud.google.com/dlp/docs/specifying-location): + Projects
   * scope, location specified: `projects/`PROJECT_ID`/locations/`LOCATION_ID +
   * Projects scope, no location specified (defaults to global):
   * `projects/`PROJECT_ID The following example `parent` string specifies a
   * parent project with the identifier `example-project`, and specifies the
   * `europe-west3` location for processing data: parent=projects/example-
   * project/locations/europe-west3
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Allows filtering. Supported syntax: * Filter
   * expressions are made up of one or more restrictions. * Restrictions can be
   * combined by `AND` or `OR` logical operators. A sequence of restrictions
   * implicitly uses `AND`. * A restriction has the form of `{field} {operator}
   * {value}`. * Supported fields/values for inspect jobs: - `state` -
   * PENDING|RUNNING|CANCELED|FINISHED|FAILED - `inspected_storage` -
   * DATASTORE|CLOUD_STORAGE|BIGQUERY - `trigger_name` - The resource name of the
   * trigger that created job. - 'end_time` - Corresponds to time the job
   * finished. - 'start_time` - Corresponds to time the job finished. * Supported
   * fields for risk analysis jobs: - `state` - RUNNING|CANCELED|FINISHED|FAILED -
   * 'end_time` - Corresponds to time the job finished. - 'start_time` -
   * Corresponds to time the job finished. * The operator must be `=` or `!=`.
   * Examples: * inspected_storage = cloud_storage AND state = done *
   * inspected_storage = cloud_storage OR inspected_storage = bigquery *
   * inspected_storage = cloud_storage AND (state = done OR state = canceled) *
   * end_time > \"2017-12-12T00:00:00+00:00\" The length of this field should be
   * no more than 500 characters.
   * @opt_param string locationId Deprecated. This field has no effect.
   * @opt_param string orderBy Comma separated list of fields to order by,
   * followed by `asc` or `desc` postfix. This list is case-insensitive, default
   * sorting order is ascending, redundant space characters are insignificant.
   * Example: `name asc, end_time asc, create_time desc` Supported fields are: -
   * `create_time`: corresponds to time the job was created. - `end_time`:
   * corresponds to time the job ended. - `name`: corresponds to job's name. -
   * `state`: corresponds to `state`
   * @opt_param int pageSize The standard list page size.
   * @opt_param string pageToken The standard list page token.
   * @opt_param string type The type of job. Defaults to `DlpJobType.INSPECT`
   * @return Google_Service_DLP_GooglePrivacyDlpV2ListDlpJobsResponse
   */
  public function listProjectsLocationsDlpJobs($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_DLP_GooglePrivacyDlpV2ListDlpJobsResponse");
  }
}
