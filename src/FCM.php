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

    public static function subscribeToTopic(string $bearerToken, string $topic, array $tokens)
    {
        $host = Client::FCM_TOPIC_MANAGEMENT_HOST;
        $path = Client::FCM_TOPIC_MANAGEMENT_ADD_PATH;
        $client = new Client();
        $url = "https://{$host}/{$path}";
        $body = [
            'to' => "/topics/{$topic}",
            'registration_tokens' => $tokens
        ];
        $client->post($bearerToken, $url, $body);
    }

    public static function unsubscribeFromTopic(string $bearerToken, string $topic, array $tokens)
    {
        $host = Client::FCM_TOPIC_MANAGEMENT_HOST;
        $path = Client::FCM_TOPIC_MANAGEMENT_REMOVE_PATH;
        $client = new Client();
        $url = "https://{$host}/{$path}";
        $body = [
            'to' => "/topics/{$topic}",
            'registration_tokens' => $tokens
        ];
        $client->post($bearerToken, $url, $body);
    }
}
