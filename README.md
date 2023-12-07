
# FCM Http v1 for PHP

<img src="docs/banner.png" alt="Firebase Cloud Messaging Http v1" width="100%">

Firebase Cloud Messaging Http v1 for PHP

- [FCM Http v1 for PHP](#fcm-http-v1-for-php)
  - [Installation](#installation)
  - [Send a message](#send-a-message)
  - [Send multiple messages](#send-multiple-messages)
  - [Subscribe to topic](#subscribe-to-topic)
  - [Unsubscribe from topic](#unsubscribe-from-topic)

## Installation

```sh
composer require kedniko/firebase-cloud-messaging-http-v1-php
```

## Send a message

```php

<?php

$authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
$projectID = 'my-project-1';
$body = [
    'message' => [
        'token' => '<token:string>',
        'notification' => [
            'title' => 'Breaking News',
            'body' => 'New news story available.',
        ],
        'data' => [
            'story_id' => 'story_12345',
        ],
    ],
];

$bearerToken = FCM::getBearerToken($authKeyContent);

FCM::send($bearerToken, $projectID, $body);

```

## Send multiple messages

```php

<?php

$authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
$projectID = 'my-project-1';
$tokens = [
    '<token1:string>',
    '<token2:string>',
    '<token3:string>',
];

$bearerToken = FCM::getBearerToken($authKeyContent);

foreach ($tokens as $token) {
    $body = [
        'message' => [
            'token' => $token,
            'notification' => [
                'title' => 'Breaking News',
                'body' => 'New news story available.',
            ],
            'data' => [
                'story_id' => 'story_12345',
            ],
        ],
    ];

    FCM::send($bearerToken, $projectID, $body);
}

```

## Subscribe to topic

```php

<?php

$authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
$tokens = [
    '<token1:string>',
    '<token2:string>',
    '<token3:string>',
];

$bearerToken = FCM::getBearerToken($authKeyContent);
FCM::subscribeToTopic($bearerToken, 'my-topic-1', $tokens);

```

## Unsubscribe from topic

```php

<?php

$authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
$tokens = [
    '<token1:string>',
    '<token2:string>',
    '<token3:string>',
];

$bearerToken = FCM::getBearerToken($authKeyContent);
FCM::unsubscribeFromTopic($bearerToken, 'my-topic-1', $tokens);

```

Credits:
<https://github.com/lkaybob/php-fcm-v1>
