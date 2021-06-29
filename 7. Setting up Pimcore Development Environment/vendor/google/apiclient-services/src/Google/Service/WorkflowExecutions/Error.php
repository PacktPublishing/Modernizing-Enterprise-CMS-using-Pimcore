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

class Google_Service_WorkflowExecutions_Error extends Google_Model
{
  public $context;
  public $payload;
  protected $stackTraceType = 'Google_Service_WorkflowExecutions_StackTrace';
  protected $stackTraceDataType = '';

  public function setContext($context)
  {
    $this->context = $context;
  }
  public function getContext()
  {
    return $this->context;
  }
  public function setPayload($payload)
  {
    $this->payload = $payload;
  }
  public function getPayload()
  {
    return $this->payload;
  }
  /**
   * @param Google_Service_WorkflowExecutions_StackTrace
   */
  public function setStackTrace(Google_Service_WorkflowExecutions_StackTrace $stackTrace)
  {
    $this->stackTrace = $stackTrace;
  }
  /**
   * @return Google_Service_WorkflowExecutions_StackTrace
   */
  public function getStackTrace()
  {
    return $this->stackTrace;
  }
}
