<?php
namespace Telphin\Methods\Client;

/**
 * REST API documentation https://ringme-confluence.atlassian.net/wiki/pages/viewpage.action?pageId=17367123
 */
trait Agent
{
  function getAgentsList(array $extension_id = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/";
    $method = "GET";
    $data = [];
    if($extension_id) $data['extension_id'] = $extension_id;
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function addNewAgent(array $data = [], $client_id = "@me")
  {
    return $this->conf->conf("errors.methodNotAllowed");
  }

  function deleteAgent($agent_id, $remove_from_queues = true, $client_id = "@me")
  {
    return $this->conf->conf("errors.methodNotAllowed");
  }

  function getAgentByID($agent_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function updateAgent($agent_id, $data = [], $client_id = "@me")
  {
    return $this->conf->conf("errors.methodNotAllowed");
  }

  function getAgentEvents($agent_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function addAgentEvent($agent_id, $data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function delAgentEventByID($agent_id, $event_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event/{$event_id}";
    $method = "DELETE";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getAgentEventByID($agent_id, $event_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event/{$event_id}";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getRegStatusLog($data, $order = "desc", $client_id = "@me")
  {
    //if(!@$data['start_datetime'] || !@$data['end_datetime']) return $this->conf->conf("errors.paramsRequire");
    $path = self::$version."/client/{$client_id}/reg_status_log/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getAlias($data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/alias/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getDID($data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/did/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getExtension($data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function addExtension(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }
  /* Records block  */
  function getRecordList(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getRecordArchive(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/archive/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function getRecordStats(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/stats/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function delRecordByID($record_uuid, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/";
    $method = "DELETE";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getRecordByID($record_uuid, $client_id = "@me") // Need tests
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function downloadRecord($record_uuid, $client_id = "@me") // Need tests
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/download/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getRecordStorage($record_uuid, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/storage_url/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }
}
?>
