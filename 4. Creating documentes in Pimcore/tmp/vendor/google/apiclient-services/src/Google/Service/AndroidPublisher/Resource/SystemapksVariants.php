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
 * The "variants" collection of methods.
 * Typical usage is:
 *  <code>
 *   $androidpublisherService = new Google_Service_AndroidPublisher(...);
 *   $variants = $androidpublisherService->variants;
 *  </code>
 */
class Google_Service_AndroidPublisher_Resource_SystemapksVariants extends Google_Service_Resource
{
  /**
   * Creates an APK which is suitable for inclusion in a system image from an
   * already uploaded Android App Bundle. (variants.create)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param Google_Service_AndroidPublisher_Variant $postBody
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Variant
   */
  public function create($packageName, $versionCode, Google_Service_AndroidPublisher_Variant $postBody, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'versionCode' => $versionCode, 'postBody' => $postBody);
    $params = array_merge($params, $optParams);
    return $this->call('create', array($params), "Google_Service_AndroidPublisher_Variant");
  }
  /**
   * Downloads a previously created system APK which is suitable for inclusion in
   * a system image. (variants.download)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param string $variantId The ID of a previously created system APK variant.
   * @param array $optParams Optional parameters.
   */
  public function download($packageName, $versionCode, $variantId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'versionCode' => $versionCode, 'variantId' => $variantId);
    $params = array_merge($params, $optParams);
    return $this->call('download', array($params));
  }
  /**
   * Returns a previously created system APK variant. (variants.get)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param string $variantId The ID of a previously created system APK variant.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_Variant
   */
  public function get($packageName, $versionCode, $variantId, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'versionCode' => $versionCode, 'variantId' => $variantId);
    $params = array_merge($params, $optParams);
    return $this->call('get', array($params), "Google_Service_AndroidPublisher_Variant");
  }
  /**
   * Returns the list of previously created system APK variants.
   * (variants.listSystemapksVariants)
   *
   * @param string $packageName Package name of the app.
   * @param string $versionCode The version code of the App Bundle.
   * @param array $optParams Optional parameters.
   * @return Google_Service_AndroidPublisher_SystemApksListResponse
   */
  public function listSystemapksVariants($packageName, $versionCode, $optParams = array())
  {
    $params = array('packageName' => $packageName, 'versionCode' => $versionCode);
    $params = array_merge($params, $optParams);
    return $this->call('list', array($params), "Google_Service_AndroidPublisher_SystemApksListResponse");
  }
}
