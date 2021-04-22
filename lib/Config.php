<?php
namespace Telphin;
/**
 *
 */
class Config
{

  private $confPath = __DIR__ . "/../config.json";
  private $data;

  function __construct()
  {
    $exist_conf = \file_exists($this->confPath);
    if($exist_conf) $this->data = json_decode(
      \file_get_contents($this->confPath),
      true
    );
  }

  public function conf(string $path)
  {
    $confData = $this->data;
    if(empty($confData)) throw new \Exception("Не удалось получить конфигурационный файл по пути {$this->confPath}", 1);
    $arr = explode('.', $path);
    foreach ($arr as $value) {
      if(array_key_exists($value, $confData)) {
        $confData = $confData[$value];
        continue;
      } else {
        return false;
      }
    }
    return $confData;
  }
}
 ?>
