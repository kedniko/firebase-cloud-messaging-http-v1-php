<?php

use Kedniko\FCM\FCM;

it('send-one-message', function () {

    $authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
    $bearerToken = FCM::getBearerToken($authKeyContent);
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

    FCM::send($bearerToken, $projectID, $body);
});

it('send-multiple-messages', function () {

    $authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
    $bearerToken = FCM::getBearerToken($authKeyContent);
    $projectID = 'my-project-1';

    $tokens = [
        '<token1:string>',
        '<token2:string>',
        '<token3:string>',
    ];

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
});

it('subscribe-to-topic', function () {

    $authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
    $bearerToken = FCM::getBearerToken($authKeyContent);

    $tokens = [
        '<token1:string>',
        '<token2:string>',
        '<token3:string>',
    ];

    FCM::subscribeToTopic($bearerToken, 'my-topic-1', $tokens);
});

it('unsubscribe-from-topic', function () {

    $authKeyContent = json_decode(file_get_contents(__DIR__ . '/appname-30xfgre76.json'), true);
    $bearerToken = FCM::getBearerToken($authKeyContent);

    $tokens = [
        '<token1:string>',
        '<token2:string>',
        '<token3:string>',
    ];

    FCM::unsubscribeFromTopic($bearerToken, 'my-topic-1', $tokens);
});
