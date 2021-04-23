# Telphin
Unofficial php-api-SDK!
На данный момент поддерживается только один тип авторизации приложения - client_credentials

Официальная документация telphin - https://ringme-confluence.atlassian.net/wiki/spaces/Ringme/overview
Интерактивный обозреватель Api - https://apiproxy.telphin.ru/api/ver1.0/client_api_explorer/

# В РАЗРАБОТКЕ!
```
composer require telphin/api-client:dev-master
```

# Подключение
Перед началом использования подключите autoload композера.
Основной класс для работы подключается следующим образом
```PHP
$client = new Telphin\Client(
  "{Your client_id}",
  "{Your client_secret}"
);
```

# Работа с методами
Пример получения внутренних номеров для пользователя типа Клиент
```PHP
$clientExtensions = $client->getClExtension();
```
В качестве параметров по умолчанию передается $data = [] и $client_id = "@me".
Все данные которые может принимать массив $data указаны в интерактивном обозревателе GET /api/ver1.0/client/{client_id}/extension/

Если требуется получить только список очередей, можно воспользоваться таким способом
```PHP
$clientQueue = $client->getClExtension(array(
  "type" => "queue"
));
```
Большинство методов обозначаются так **{get/add/upd/del}{Cl/Ext}{NameAndDescription}**. Например getClRecordList, addClNewAgent, getExtAgent.

# Описание доступных методов
**Получить лимиты клиента:** GET /client/{client_id}/limit/
```PHP
$clientLimit = $client->getClLimit("@me");
```

**Получить группы внутренних номеров:** GET /client/{client_id}/extension_group/
```PHP
$client->getClExtensionGroup();
```

**Добавить группу внутренних номеров:** POST /client/{client_id}/extension_group/
```PHP
$client->addClExtensionGroup(array(
  "name" => "Тестовая группа",
  "extra_params" => ""
));
```

**Обновить группу внутренних номеров:** PUT /client/{client_id}/extension_group/{ext_group_id}
```PHP
$client->updClExtensionGroup(8447, array(
  "name" => "неТестовая группа",
));
```

**Удалить группу внутренних номеров:** DELETE /client/{client_id}/extension_group/{ext_group_id}
```PHP
$client->delClExtensionGroup(8447);
```

**Получить список внутренних номеров клиента:** GET /client/{client_id}/extension/
```PHP
/**
* @param array $data = [] массив с параметрами фильтра
* @param int $extension_id = 0 для поиска по определенному id
*/
$client->getClExtension(); // ЛИСТ
$client->getClExtension([], 1231); // Конкретный номер
```

**Добавить внутренний номер:** POST /client/{client_id}/extension/
```PHP
/**
* @param array $data - массив с параметрами
*/
$client->addClExtension([], 1231);
```

**Обновить внутренний номер:** PUT /client/{client_id}/extension/{extension_id}
```PHP
/**
* @param array $data - массив с параметрами
* @param int $extension_id
*/
$client->updClExtension(array(
  "caller_id_name" => "Тест",
  "label" => "Тест"
), 1231);
```

**Удалить внутренний номер:** DELETE /client/{client_id}/extension/{extension_id}
```PHP
/**
* @param int $extension_id
*/
$client->delClExtension(1231);
```

**Полуть список агентов:** GET /client/{client_id}/agent/local/
```PHP
/**
* @param array[int] $extension_id = [] для выборки добавочных
*/
$client->getClAgentsList();
```

**Получить http-события агента очереди:** GET /client/{client_id}/agent/local/{agent_id}/event/
```PHP
/**
* @param int $agent_id идентификтор агента очереди
* @param int $event_id = 0 Для получения конкретного события
*/
$client->getClAgentEvents(1231);
```

**Добавить http-событие агента очереди:** POST /client/{client_id}/agent/local/{agent_id}/event/
```PHP
/**
* @param int $agent_id идентификтор агента очереди
* @param array $data параметры
*/
$client->addClAgentEvent(3443, array(
  "event_type" => "agent-login",
  "method" => "POST",
  "url" => "{Your handler url}"
));
```

**Удалить http-событие агента очереди:** DELETE /client/{client_id}/agent/local/{agent_id}/event/{event_id}
```PHP
/**
* @param int $agent_id идентификтор агента очереди
* @param int $event_id идентификатор события
*/
$client->delClAgentEvent(3443, 2341);
```
