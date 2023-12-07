<?php

namespace Kedniko\FCM;

final class FCM
{
    public static function getBearerToken(array $keyContent)
    {
        $c = new Credentials();
        $c->setKeyFileContent($keyContent);

        return $c->getAccessToken();
    }

    public static function send(string $bearerToken, $projectID, $body): void
    {
        $client = new Client();
        $client->send($bearerToken, $projectID, $body);
    }
}
