<?php
namespace Telphin\Methods\Client;

/**
 * REST API documentation https://ringme-confluence.atlassian.net/wiki/pages/viewpage.action?pageId=17367123
 */
trait Agent
{
  function getClAgentsList(array $extension_id = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/";
    $method = "GET";
    $data = [];
    if($extension_id) $data['extension_id'] = $extension_id;
    $result = $this->makeRequest($path, $method, $data);
    return $result;
  }

  function addClNewAgent(array $data = [], $client_id = "@me")
  {
    return $this->conf->conf("errors.methodNotAllowed");
  }

  function delClAgent($agent_id, $remove_from_queues = true, $client_id = "@me")
  {
    return $this->conf->conf("errors.methodNotAllowed");
  }

  function getClAgentByID($agent_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function updClAgent($agent_id, $data = [], $client_id = "@me")
  {
    return $this->conf->conf("errors.methodNotAllowed");
  }

  function getClAgentEvents($agent_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event/";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function addClAgentEvent($agent_id, $data = [], $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event/";
    $method = "POST";
    $result = $this->makeRequest($path, $method, $data, true);
    return $result;
  }

  function delClAgentEventByID($agent_id, $event_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event/{$event_id}";
    $method = "DELETE";
    $result = $this->makeRequest($path, $method);
    return $result;
  }

  function getClAgentEventByID($agent_id, $event_id, $client_id = "@me")
  {
    $path = self::$version."/client/{$client_id}/agent/local/{$agent_id}/event/{$event_id}";
    $method = "GET";
    $result = $this->makeRequest($path, $method);
    return $result;
  }
}
?>
