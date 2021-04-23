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
}

?>
