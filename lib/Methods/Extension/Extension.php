<?php
namespace Telphin\Methods\Extension;

/**
 *
 */
trait Extension
{
  function getExtRegistration($data = [])
  {
    $path = self::$version."/extension/registration/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getExtAgent($extension_id)
  {
    $path = self::$version."/extension/{$extension_id}/agent/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getExtCdr($extension_id, $data)
  {
    $path = self::$version."/extension/{$extension_id}/cdr/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getExtCdrStats($extension_id, $data)
  {
    $path = self::$version."/extension/{$extension_id}/cdr/stats/";
    $method = "GET";
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function getExtQueueStatus($extension_id)
  {
    $path = self::$version."/extension/{$extension_id}/queue/status/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function addExtEvent($extension_id, array $data)
  {
    $path = self::$version."/extension/{$extension_id}/event/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function getExtEvent($extension_id)
  {
    $path = self::$version."/extension/{$extension_id}/event/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function delExtEvent($extension_id, $event_id)
  {
    $path = self::$version."/extension/{$extension_id}/event/{$event_id}";
    $method = "DELETE";
    $result = $this->makeRequest($path, $method);
    return $result;
  }


}

?>
