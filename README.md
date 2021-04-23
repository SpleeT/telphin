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
$clientExtensions = $client->getClExtList();
```
В качестве параметров по умолчанию передается $data = [] и $client_id = "@me".
Все данные которые может принимать массив $data указаны в интерактивном обозревателе GET /api/ver1.0/client/{client_id}/extension/

Если требуется получить только список очередей, можно воспользоваться таким способом
```PHP
$clientQueue = $client->getClExtList(array(
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
