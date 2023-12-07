<?php

use Kedniko\FCM\FCM;

it('should return true', function () {

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
