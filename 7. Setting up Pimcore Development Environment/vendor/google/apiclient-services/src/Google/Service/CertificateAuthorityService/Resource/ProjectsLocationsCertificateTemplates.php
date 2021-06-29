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
 * The "certificateTemplates" collection of methods.
 * Typical usage is:
 *  <code>
 *   $privatecaService = new Google_Service_CertificateAuthorityService(...);
 *   $certificateTemplates = $privatecaService->certificateTemplates;
 *  </code>
 */
class Google_Service_CertificateAuthorityService_Resource_ProjectsLocationsCertificateTemplates extends Google_Service_Resource
{
  /**
   * Create a new CertificateTemplate in a given Project and Location.
   * (certificateTemplates.create)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the CertificateTemplate, in the format `projects/locations`.
   * @param Google_Service_CertificateAuthorityService_CertificateTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string certificateTemplateId Required. It must be unique within a
   * location and match the regular expression `[a-zA-Z0-9_-]{1,63}`
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function create($parent, Google_Service_CertificateAuthorityService_CertificateTemplate $postBody, $optParams = array())
  {
    $params = array('parent' => $parent, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * DeleteCertificateTemplate deletes a CertificateTemplate.
   * (certificateTemplates.delete)
   *
   * @param string $name Required. The resource name for this CertificateTemplate
   * in the format `projects/locations/certificateTemplates`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function delete($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Returns a CertificateTemplate. (certificateTemplates.get)
   *
   * @param string $name Required. The name of the CertificateTemplate to get.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_CertificateTemplate
   */
  public function get($name, $optParams = array())
  {
    $params = array('name' => $name);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_CertificateAuthorityService_CertificateTemplate");
  }
  /**
   * Gets the access control policy for a resource. Returns an empty policy if the
   * resource exists and does not have a policy set.
   * (certificateTemplates.getIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * requested. See the operation documentation for the appropriate value for this
   * field.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int options.requestedPolicyVersion Optional. The policy format
   * version to be returned. Valid values are 0, 1, and 3. Requests specifying an
   * invalid value will be rejected. Requests for policies with any conditional
   * bindings must specify version 3. Policies without any conditional bindings
   * may specify any valid value or leave the field unset. To learn which
   * resources support conditions in their IAM policies, see the [IAM
   * documentation](https://cloud.google.com/iam/help/conditions/resource-
   * policies).
   * @return Google_Service_CertificateAuthorityService_Policy
   */
  public function getIamPolicy($resource, $optParams = array())
  {
    $params = array('resource' => $resource);
    $params = array_merge($params, $optParams);
    return $this->call('getIamPolicy', array($params), "Google_Service_CertificateAuthorityService_Policy");
  }
  /**
   * Lists CertificateTemplates.
   * (certificateTemplates.listProjectsLocationsCertificateTemplates)
   *
   * @param string $parent Required. The resource name of the location associated
   * with the CertificateTemplates, in the format `projects/locations`.
   * @param array $optParams Optional parameters.
   *
   * @opt_param string filter Optional. Only include resources that match the
   * filter in the response.
   * @opt_param string orderBy Optional. Specify how the results should be sorted.
   * @opt_param int pageSize Optional. Limit on the number of CertificateTemplates
   * to include in the response. Further CertificateTemplates can subsequently be
   * obtained by including the ListCertificateTemplatesResponse.next_page_token in
   * a subsequent request. If unspecified, the server will pick an appropriate
   * default.
   * @opt_param string pageToken Optional. Pagination token, returned earlier via
   * ListCertificateTemplatesResponse.next_page_token.
   * @return Google_Service_CertificateAuthorityService_ListCertificateTemplatesResponse
   */
  public function listProjectsLocationsCertificateTemplates($parent, $optParams = array())
  {
    $params = array('parent' => $parent);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_CertificateAuthorityService_ListCertificateTemplatesResponse");
  }
  /**
   * Update a CertificateTemplate. (certificateTemplates.patch)
   *
   * @param string $name Output only. The resource name for this
   * CertificateTemplate in the format `projects/locations/certificateTemplates`.
   * @param Google_Service_CertificateAuthorityService_CertificateTemplate $postBody
   * @param array $optParams Optional parameters.
   *
   * @opt_param string requestId Optional. An ID to identify requests. Specify a
   * unique request ID so that if you must retry your request, the server will
   * know to ignore the request if it has already been completed. The server will
   * guarantee that for at least 60 minutes since the first request. For example,
   * consider a situation where you make an initial request and t he request times
   * out. If you make the request again with the same request ID, the server can
   * check if original operation with the same request ID was received, and if so,
   * will ignore the second request. This prevents clients from accidentally
   * creating duplicate commitments. The request ID must be a valid UUID with the
   * exception that zero UUID is not supported
   * (00000000-0000-0000-0000-000000000000).
   * @opt_param string updateMask Required. A list of fields to be updated in this
   * request.
   * @return Google_Service_CertificateAuthorityService_Operation
   */
  public function patch($name, Google_Service_CertificateAuthorityService_CertificateTemplate $postBody, $optParams = array())
  {
    $params = array('name' => $name, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('patch', array($params), "Google_Service_CertificateAuthorityService_Operation");
  }
  /**
   * Sets the access control policy on the specified resource. Replaces any
   * existing policy. Can return `NOT_FOUND`, `INVALID_ARGUMENT`, and
   * `PERMISSION_DENIED` errors. (certificateTemplates.setIamPolicy)
   *
   * @param string $resource REQUIRED: The resource for which the policy is being
   * specified. See the operation documentation for the appropriate value for this
   * field.
   * @param Google_Service_CertificateAuthorityService_SetIamPolicyRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_Policy
   */
  public function setIamPolicy($resource, Google_Service_CertificateAuthorityService_SetIamPolicyRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('setIamPolicy', array($params), "Google_Service_CertificateAuthorityService_Policy");
  }
  /**
   * Returns permissions that a caller has on the specified resource. If the
   * resource does not exist, this will return an empty set of permissions, not a
   * `NOT_FOUND` error. Note: This operation is designed to be used for building
   * permission-aware UIs and command-line tools, not for authorization checking.
   * This operation may "fail open" without warning.
   * (certificateTemplates.testIamPermissions)
   *
   * @param string $resource REQUIRED: The resource for which the policy detail is
   * being requested. See the operation documentation for the appropriate value
   * for this field.
   * @param Google_Service_CertificateAuthorityService_TestIamPermissionsRequest $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_CertificateAuthorityService_TestIamPermissionsResponse
   */
  public function testIamPermissions($resource, Google_Service_CertificateAuthorityService_TestIamPermissionsRequest $postBody, $optParams = array())
  {
    $params = array('resource' => $resource, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('testIamPermissions', array($params), "Google_Service_CertificateAuthorityService_TestIamPermissionsResponse");
  }
}
