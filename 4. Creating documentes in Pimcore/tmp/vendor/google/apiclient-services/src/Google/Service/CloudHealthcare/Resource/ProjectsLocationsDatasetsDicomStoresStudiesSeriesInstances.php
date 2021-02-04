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
 * The "instances" collection of methods.
 * Typical usage is:
 *  <code>
 *   $healthcareService = new Google_Service_CloudHealthcare(...);
 *   $instances = $healthcareService->instances;
 *  </code>
 */
class Google_Service_CloudHealthcare_Resource_ProjectsLocationsDatasetsDicomStoresStudiesSeriesInstances extends Google_Service_Resource
{
  /**
   * DeleteInstance deletes an instance associated with the given study, series,
   * and SOP Instance UID. Delete requests are equivalent to the GET requests
   * specified in the Retrieve transaction. Study and series search results can
   * take a few seconds to be updated after an instance is deleted using
   * DeleteInstance. For samples that show how to call DeleteInstance, see
   * [Deleting a study, series, or
   * instance](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#deleting_a_study_series_or_instance). (instances.delete)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the DeleteInstance request. For
   * example, `studies/{study_uid}/series/{series_uid}/instances/{instance_uid}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HealthcareEmpty
   */
  public function delete($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('delete', array($params), "Google_Service_CloudHealthcare_HealthcareEmpty");
  }
  /**
   * RetrieveInstance returns instance associated with the given study, series,
   * and SOP Instance UID. See [RetrieveTransaction] (http://dicom.nema.org/medica
   * l/dicom/current/output/html/part18.html#sect_10.4). For details on the
   * implementation of RetrieveInstance, see [DICOM study/series/instances](https:
   * //cloud.google.com/healthcare/docs/dicom#dicom_studyseriesinstances) and
   * [DICOM
   * instances](https://cloud.google.com/healthcare/docs/dicom#dicom_instances) in
   * the Cloud Healthcare API conformance statement. For samples that show how to
   * call RetrieveInstance, see [Retrieving an
   * instance](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#retrieving_an_instance). (instances.retrieveInstance)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the RetrieveInstance DICOMweb
   * request. For example,
   * `studies/{study_uid}/series/{series_uid}/instances/{instance_uid}`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveInstance($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveInstance', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * RetrieveInstanceMetadata returns instance associated with the given study,
   * series, and SOP Instance UID presented as metadata with the bulk data
   * removed. See [RetrieveTransaction] (http://dicom.nema.org/medical/dicom/curre
   * nt/output/html/part18.html#sect_10.4). For details on the implementation of
   * RetrieveInstanceMetadata, see [Metadata
   * resources](https://cloud.google.com/healthcare/docs/dicom#metadata_resources)
   * in the Cloud Healthcare API conformance statement. For samples that show how
   * to call RetrieveInstanceMetadata, see [Retrieving
   * metadata](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#retrieving_metadata). (instances.retrieveMetadata)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the RetrieveInstanceMetadata DICOMweb
   * request. For example,
   * `studies/{study_uid}/series/{series_uid}/instances/{instance_uid}/metadata`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveMetadata($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveMetadata', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
  /**
   * RetrieveRenderedInstance returns instance associated with the given study,
   * series, and SOP Instance UID in an acceptable Rendered Media Type. See
   * [RetrieveTransaction] (http://dicom.nema.org/medical/dicom/current/output/htm
   * l/part18.html#sect_10.4). For details on the implementation of
   * RetrieveRenderedInstance, see [Rendered
   * resources](https://cloud.google.com/healthcare/docs/dicom#rendered_resources)
   * in the Cloud Healthcare API conformance statement. For samples that show how
   * to call RetrieveRenderedInstance, see [Retrieving consumer image
   * formats](https://cloud.google.com/healthcare/docs/how-
   * tos/dicomweb#retrieving_consumer_image_formats). (instances.retrieveRendered)
   *
   * @param string $parent The name of the DICOM store that is being accessed. For
   * example, `projects/{project_id}/locations/{location_id}/datasets/{dataset_id}
   * /dicomStores/{dicom_store_id}`.
   * @param string $dicomWebPath The path of the RetrieveRenderedInstance DICOMweb
   * request. For example,
   * `studies/{study_uid}/series/{series_uid}/instances/{instance_uid}/rendered`.
   * @param array $optParams Optional parameters.
   * @return Google_Service_CloudHealthcare_HttpBody
   */
  public function retrieveRendered($parent, $dicomWebPath, $optParams = array())
  {
    $params = array('parent' => $parent, 'dicomWebPath' => $dicomWebPath);
    $params = array_merge($params, $optParams);
    return $this->call('retrieveRendered', array($params), "Google_Service_CloudHealthcare_HttpBody");
  }
}
