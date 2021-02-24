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
 * The "projects" collection of methods.
 * Typical usage is:
 *  <code>
 *   $firebaseService = new Google_Service_FirebaseManagement(...);
 *   $projects = $firebaseService->projects;
 *  </code>
 */
class Google_Service_FirebaseManagement_Resource_Projects extends Google_Service_Resource
{
  /**
   * Adds Firebase resources to the specified existing [Google Cloud Platform
   * (GCP) `Project`] (https://cloud.google.com/resource-
   * manager/reference/rest/v1/projects). Since a FirebaseProject is actually also
   * a GCP `Project`, a `FirebaseProject` has the same underlying GCP identifiers
   * (`projectNumber` and `projectId`). This allows for easy interop with Google
   * APIs. The result of this call is an [`Operation`](../../v1beta1/operations).
   * Poll the `Operation` to track the provisioning process by calling
   * GetOperation until [`done`](../../v1beta1/operations#Operation.FIELDS.done)
   * is `true`. When `done` is `true`, the `Operation` has either succeeded or
   * failed. If the `Operation` succeeded, its
   * [`response`](../../v1beta1/operations#Operation.FIELDS.response) is set to a
   * FirebaseProject; if the `Operation` failed, its
   * [`error`](../../v1beta1/operations#Operation.FIELDS.error) is set to a
   * google.rpc.Status. The `Operation` is automatically deleted after completion,
   * so there is no need to call DeleteOperation. This method does not modify any
   * billing account information on the underlying GCP `Project`. To call
   * `AddFirebase`, a project member or service account must have the following
   * permissions (the IAM roles of Editor and Owner contain these permissions):
   * `firebase.projects.update`, `resourcemanager.projects.get`,
   * `serviceusage.services.enable`, and `serviceusage.services.get`.
   * (projects.addFirebase)
   *
   * @param string $project The resource name of the GCP `Project` to which
   * Firebase resources will be added, in the format: projects/PROJECT_IDENTIFIER
   * Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values. After calling `AddFirebase`, the unique Project
   * identifiers ( [`projectNumber`](https://cloud.google.com/resource-
   * manager/reference/rest/v1/projects#Project.FIELDS.project_number) and
   * [`projectId`](https://cloud.google.com/resource-
   * manager/reference/rest/v1/projects#Project.FIELDS.project_id)) of the
   * underlying GCP `Project` are also the identifiers of the FirebaseProject.
   * @param Google_Service_FirebaseManagement_AddFirebaseRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_Operation
   */
  public function addFirebase($project, Google_Service_FirebaseManagement_AddFirebaseRequest $postBody, $optParams = array())
  {
    $params = array('project' => $project, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addFirebase', array($params), "Google_Service_FirebaseManagement_Operation");
  }
  /**
   * Links the specified FirebaseProject with an existing [Google Analytics
   * account](http://www.google.com/analytics/). Using this call, you can either:
   * - Specify an `analyticsAccountId` to provision a new Google Analytics
   * property within the specified account and associate the new property with the
   * `FirebaseProject`. - Specify an existing `analyticsPropertyId` to associate
   * the property with the `FirebaseProject`. Note that when you call
   * `AddGoogleAnalytics`: 1. The first check determines if any existing data
   * streams in the Google Analytics property correspond to any existing Firebase
   * Apps in the `FirebaseProject` (based on the `packageName` or `bundleId`
   * associated with the data stream). Then, as applicable, the data streams and
   * apps are linked. Note that this auto-linking only applies to `AndroidApps`
   * and `IosApps`. 2. If no corresponding data streams are found for the Firebase
   * Apps, new data streams are provisioned in the Google Analytics property for
   * each of the Firebase Apps. Note that a new data stream is always provisioned
   * for a Web App even if it was previously associated with a data stream in the
   * Analytics property. Learn more about the hierarchy and structure of Google
   * Analytics accounts in the [Analytics
   * documentation](https://support.google.com/analytics/answer/9303323). The
   * result of this call is an [`Operation`](../../v1beta1/operations). Poll the
   * `Operation` to track the provisioning process by calling GetOperation until
   * [`done`](../../v1beta1/operations#Operation.FIELDS.done) is `true`. When
   * `done` is `true`, the `Operation` has either succeeded or failed. If the
   * `Operation` succeeded, its
   * [`response`](../../v1beta1/operations#Operation.FIELDS.response) is set to an
   * AnalyticsDetails; if the `Operation` failed, its
   * [`error`](../../v1beta1/operations#Operation.FIELDS.error) is set to a
   * google.rpc.Status. To call `AddGoogleAnalytics`, a project member must be an
   * Owner for the existing `FirebaseProject` and have the [`Edit`
   * permission](https://support.google.com/analytics/answer/2884495) for the
   * Google Analytics account. If the `FirebaseProject` already has Google
   * Analytics enabled, and you call `AddGoogleAnalytics` using an
   * `analyticsPropertyId` that's different from the currently associated
   * property, then the call will fail. Analytics may have already been enabled in
   * the Firebase console or by specifying `timeZone` and `regionCode` in the call
   * to [`AddFirebase`](../../v1beta1/projects/addFirebase).
   * (projects.addGoogleAnalytics)
   *
   * @param string $parent The resource name of the FirebaseProject to link to an
   * existing Google Analytics account, in the format: projects/PROJECT_IDENTIFIER
   * Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param Google_Service_FirebaseManagement_AddGoogleAnalyticsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_Operation
   */
  public function addGoogleAnalytics($parent, Google_Service_FirebaseManagement_AddGoogleAnalyticsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('addGoogleAnalytics', array($params), "Google_Service_FirebaseManagement_Operation");
  }
  /**
   * Gets the specified FirebaseProject. (projects.get)
   *
   * @param string $name The resource name of the FirebaseProject, in the format:
   * projects/ PROJECT_IDENTIFIER Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_FirebaseProject
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_FirebaseManagement_FirebaseProject");
  }
  /**
   * Gets the configuration artifact associated with the specified
   * FirebaseProject, which can be used by servers to simplify initialization.
   * Typically, this configuration is used with the Firebase Admin SDK [initialize
   * App](https://firebase.google.com/docs/admin/setup#initialize_the_sdk)
   * command. (projects.getAdminSdkConfig)
   *
   * @param string $name The resource name of the FirebaseProject, in the format:
   * projects/ PROJECT_IDENTIFIER/adminSdkConfig Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_AdminSdkConfig
   */
  public function getAdminSdkConfig($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getAdminSdkConfig', array($params), "Google_Service_FirebaseManagement_AdminSdkConfig");
  }
  /**
   * Gets the Google Analytics details currently associated with the specified
   * FirebaseProject. If the `FirebaseProject` is not yet linked to Google
   * Analytics, then the response to `GetAnalyticsDetails` is `NOT_FOUND`.
   * (projects.getAnalyticsDetails)
   *
   * @param string $name The resource name of the FirebaseProject, in the format:
   * projects/ PROJECT_IDENTIFIER/analyticsDetails Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_AnalyticsDetails
   */
  public function getAnalyticsDetails($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('getAnalyticsDetails', array($params), "Google_Service_FirebaseManagement_AnalyticsDetails");
  }
  /**
   * Lists each FirebaseProject accessible to the caller. The elements are
   * returned in no particular order, but they will be a consistent view of the
   * Projects when additional requests are made with a `pageToken`. This method is
   * eventually consistent with Project mutations, which means newly provisioned
   * Projects and recent modifications to existing Projects might not be reflected
   * in the set of Projects. The list will include only ACTIVE Projects. Use
   * GetFirebaseProject for consistent reads as well as for additional Project
   * details. (projects.listProjects)
   *
   * @param array $optParams Optional parameters.
   *
   * @opt_param int pageSize The maximum number of Projects to return in the
   * response. The server may return fewer than this at its discretion. If no
   * value is specified (or too large a value is specified), the server will
   * impose its own limit. This value cannot be negative.
   * @opt_param string pageToken Token returned from a previous call to
   * `ListFirebaseProjects` indicating where in the set of Projects to resume
   * listing.
   * @return Google_Service_FirebaseManagement_ListFirebaseProjectsResponse
   */
  public function listProjects($optParams = array())
  {
    $params = array();
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_FirebaseManagement_ListFirebaseProjectsResponse");
  }
  /**
   * Updates the attributes of the specified FirebaseProject. All [query
   * parameters](#query-parameters) are required. (projects.patch)
   *
   * @param string $name The resource name of the Project, in the format:
   * projects/PROJECT_IDENTIFIER PROJECT_IDENTIFIER: the Project's
   * [`ProjectNumber`](../projects#FirebaseProject.FIELDS.project_number)
   * ***(recommended)*** or its
   * [`ProjectId`](../projects#FirebaseProject.FIELDS.project_id). Learn more
   * about using project identifiers in Google's [AIP 2510
   * standard](https://google.aip.dev/cloud/2510). Note that the value for
   * PROJECT_IDENTIFIER in any response body will be the `ProjectId`.
   * @param Google_Service_FirebaseManagement_FirebaseProject $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string updateMask Specifies which fields to update. If this list
   * is empty, then no state will be updated. Note that the fields `name`,
   * `projectId`, and `projectNumber` are all immutable.
   * @return Google_Service_FirebaseManagement_FirebaseProject
   */
  public function patch($name, Google_Service_FirebaseManagement_FirebaseProject $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_FirebaseManagement_FirebaseProject");
  }
  /**
   * Unlinks the specified FirebaseProject from its Google Analytics account. This
   * call removes the association of the specified `FirebaseProject` with its
   * current Google Analytics property. However, this call does not delete the
   * Google Analytics resources, such as the Google Analytics property or any data
   * streams. These resources may be re-associated later to the `FirebaseProject`
   * by calling [`AddGoogleAnalytics`](../../v1beta1/projects/addGoogleAnalytics)
   * and specifying the same `analyticsPropertyId`. For Android Apps and iOS Apps,
   * this call re-links data streams with their corresponding apps. However, for
   * Web Apps, this call provisions a *new* data stream for each Web App. To call
   * `RemoveAnalytics`, a project member must be an Owner for the
   * `FirebaseProject`. (projects.removeAnalytics)
   *
   * @param string $parent The resource name of the FirebaseProject to unlink from
   * its Google Analytics account, in the format: projects/PROJECT_IDENTIFIER
   * Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param Google_Service_FirebaseManagement_RemoveAnalyticsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_FirebaseManagement_FirebaseEmpty
   */
  public function removeAnalytics($parent, Google_Service_FirebaseManagement_RemoveAnalyticsRequest $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('removeAnalytics', array($params), "Google_Service_FirebaseManagement_FirebaseEmpty");
  }
  /**
   * Lists all available Apps for the specified FirebaseProject. This is a
   * convenience method. Typically, interaction with an App should be done using
   * the platform-specific service, but some tool use-cases require a summary of
   * all known Apps (such as for App selector interfaces). (projects.searchApps)
   *
   * @param string $parent The parent FirebaseProject for which to list Apps, in
   * the format: projects/ PROJECT_IDENTIFIER Refer to the `FirebaseProject`
   * [`name`](../projects#FirebaseProject.FIELDS.name) field for details about
   * PROJECT_IDENTIFIER values.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter A query string compatible with Google's
   * [AIP-160](https://google.aip.dev/160) standard. Use any of the following
   * fields in a query: *
   * [`app_id`](../projects.apps#FirebaseAppInfo.FIELDS.app_id) *
   * [`namespace`](../projects.apps#FirebaseAppInfo.FIELDS.namespace) *
   * [`platform`](../projects.apps#FirebaseAppInfo.FIELDS.platform) We also
   * support the following "virtual" fields (fields which are not actually part of
   * the returned resource object, but can be queried as if they are pre-populated
   * with specific values): * `sha1_hash`: This field is considered to be a
   * repeated `string` field, populated with the list of all SHA-1 certificate
   * fingerprints registered with the app. This list is empty if the app is not an
   * Android app. * `sha256_hash`: This field is considered to be a repeated
   * `string` field, populated with the list of all SHA-256 certificate
   * fingerprints registered with the app. This list is empty if the app is not an
   * Android app. * `app_store_id`: This field is considered to be a singular
   * `string` field, populated with the Apple App Store ID registered with the
   * app. This field is empty if the app is not an iOS app. * `team_id`: This
   * field is considered to be a singular `string` field, populated with the Apple
   * team ID registered with the app. This field is empty if the app is not an iOS
   * app.
   * @opt_param int pageSize The maximum number of Apps to return in the response.
   * The server may return fewer than this value at its discretion. If no value is
   * specified (or too large a value is specified), then the server will impose
   * its own limit. This value cannot be negative.
   * @opt_param string pageToken Token returned from a previous call to
   * `SearchFirebaseApps` indicating where in the set of Apps to resume listing.
   * @return Google_Service_FirebaseManagement_SearchFirebaseAppsResponse
   */
  public function searchApps($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('searchApps', array($params), "Google_Service_FirebaseManagement_SearchFirebaseAppsResponse");
  }
}
