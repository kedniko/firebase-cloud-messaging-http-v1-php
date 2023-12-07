<?php

namespace Kedniko\FCM;

use GuzzleHttp;

final class Client
{
    final public const CONTENT_TYPE = 'json';

    final public const HTTP_ERRORS_OPTION = 'http_errors';

    public function getUrl(string $projectID): string
    {
        return "https://fcm.googleapis.com/v1/projects/{$projectID}/messages:send";
    }

    public function send(string $bearerToken, string $projectID, array $body): bool|string
    {
        $config = ['headers' => ['Authorization' => 'Bearer ' . $bearerToken]];
        $options = [
            self::CONTENT_TYPE => $body,
            self::HTTP_ERRORS_OPTION => false
        ];
        // Class name conflict occurs, when used as "Client"
        $client = new GuzzleHttp\Client($config);
        $url = $this->getUrl($projectID);
        $response = $client->request('POST', $url, $options);

        if ($response->getStatusCode() === 200) {
            return true;
        }
        $result = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);

        return $result['error']['message'];
    }
}
