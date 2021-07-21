<?php
namespace Telphin\Methods\Client;
/**
 * Трейт для пользователя типа клиент, методы не связаны с Агентами
 */
trait Client
{
  function getClLimit($client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/limit/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getClInfo($client_id = "@me")
  {
    $path = self::$version."/client/client_info/{$client_id}/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getClRegStatusLog($data, $order = "desc", $client_id = "@me")
  {
    //if(!@$data['start_datetime'] || !@$data['end_datetime']) return $this->conf->conf("errors.paramsRequire");
    $path = self::$version."/client/{$client_id}/reg_status_log/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getClAlias($data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/alias/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getClDID($data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/did/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getClCallHistory($data = [], $call_uuid = "", $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/call_history/{$call_uuid}";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getClExtension($data = [], int $extension_id = 0, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension/";
    if(!empty($extension_id)) $path .= "{$extension_id}";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function addClExtension(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function updClExtension($extension_id, array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension/{$extension_id}";
    $method = "PUT";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function delClExtension($extension_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension/{$extension_id}";
    $method = "DELETE";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getClExtensionGroup($data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension_group/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function addClExtensionGroup(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension_group/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function updClExtensionGroup(int $ext_group_id, array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension_group/{$ext_group_id}";
    $method = "PUT";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function delClExtensionGroup(int $ext_group_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/extension_group/{$ext_group_id}";
    $method = "DELETE";
    $result = $this->makeRequest($path, $method);
    return $result;
  }
  /* Records block  */
  function getClRecordList(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getClRecordArchive(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/archive/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function getClRecordStats(array $data, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/stats/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function delClRecordByID($record_uuid, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/";
    $method = "DELETE";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getClRecordByID($record_uuid, $client_id = "@me") // Need tests
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function downloadClRecord($record_uuid, $client_id = "@me") // Need tests
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/download/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getClRecordStorage($record_uuid, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/record/{$record_uuid}/storage_url/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getClCurrentCalls($client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/current_calls/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }
}

?>
