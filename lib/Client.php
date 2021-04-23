<?php
namespace Telphin;
use Telphin\Config;
use Telphin\Methods;
/**
 * Connection with api telphin
 * Methods - traits
 */
class Client
{
  const METHOD_GET    = 'GET';
  const METHOD_POST   = 'POST';
  const METHOD_DELETE = 'DELETE';
  const METHOD_PUT    = 'PUT';
  const GRANT_TYPE  = 'client_credentials';
  public $type = 'client';
  private $client_id;
  private $client_secret;
  private $conf;
  private $url;
  private static $version;

  function __construct(string $client_id, string $client_secret)
  {
    $this->client_id = $client_id;
    $this->client_secret = $client_secret;
    $this->conf = (new Config);
    $this->url = $this->conf->conf("url");
    self::$version = $this->conf->conf("versionPrefix");
  }

  private function refreshToken()
  {
    $path   = "/oauth/token";
    $method = "POST";
    $data   = [
      "grant_type"    => self::GRANT_TYPE,
      "client_secret" => $this->client_secret,
      "client_id"     => $this->client_id
    ];
    $result = $this->makeRequest($path, $method, $data);
    return $result->access_token;
  }

  private function makeRequest(string $path, string $method, array $data = [], $encode = false)
  {
    $curlHandler = curl_init();
      if (self::METHOD_GET == $method && count($data)) {
         $path .= "?".http_build_query($data, '', '&');
      }
      if ($encode) $data = json_encode($data);
      curl_setopt($curlHandler, CURLOPT_URL, $this->url.$path);
      curl_setopt($curlHandler, CURLOPT_RETURNTRANSFER, 1);
      curl_setopt($curlHandler, CURLOPT_FOLLOWLOCATION, 1);
      curl_setopt($curlHandler, CURLOPT_FAILONERROR, false);
      curl_setopt($curlHandler, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curlHandler, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($curlHandler, CURLOPT_TIMEOUT, $this->conf->conf("timeout"));
      curl_setopt($curlHandler, CURLOPT_CONNECTTIMEOUT, $this->conf->conf("timeout"));
      switch ($method) {
        case self::METHOD_POST:
          curl_setopt($curlHandler, CURLOPT_POST, 1);
          curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $data);
          break;
        case self::METHOD_DELETE:
          curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, "DELETE");
          curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $data);
          break;
        case self::METHOD_PUT:
          curl_setopt($curlHandler, CURLOPT_CUSTOMREQUEST, "PUT");
          curl_setopt($curlHandler, CURLOPT_POSTFIELDS, $data);
          break;
      }
    if ($path != "/oauth/token") {
      curl_setopt($curlHandler, CURLOPT_HEADER, 0);
      curl_setopt($curlHandler, CURLOPT_HTTPHEADER, [
        "Content-Type: application/json",
        "authorization: Bearer {$this->refreshToken()}"
      ]);
    }
    $result = curl_exec($curlHandler);
    $codeResponse = curl_getinfo($curlHandler, CURLINFO_RESPONSE_CODE);
    curl_close($curlHandler);
    if ($codeResponse == "404") return (object)$this->conf->conf("errors.response404");
    $result = json_decode($result);
    return $result;
  }

  use Methods\Client\Agent;
  use Methods\Extension\Extension;
}
?>
