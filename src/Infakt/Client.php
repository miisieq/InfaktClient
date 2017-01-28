<?php

namespace Infakt;

use GuzzleHttp\ClientInterface;
use Infakt\Exception\ConfigurationException;

class Client
{

    const API_ENDPOINT = 'https://api.infakt.pl';

    const API_VERSION = 'v3';

    protected $requestCount = 0;

    /**
     * @var ClientInterface
     */
    protected $client;

    public function __construct(array $config = [])
    {
        $this->config = array_merge([
            'api_key' => null
        ], $config);

        if (!$config['api_key']) {
            throw new ConfigurationException('Required "api_key" key not supplied in the config.');
        }

        $this->client = new \GuzzleHttp\Client([
            'headers' => [
                'X-inFakt-ApiKey' => $config['api_key']
            ]
        ]);
    }


    public function get($query)
    {
        $this->writeDebugQuery($this->buildQuery($query));
        return $this->client->get($this->buildQuery($query));
    }

    public function post($query, $body = null)
    {
        $options = [
            'headers' => [
                'Content-Type' => 'application/json'
            ]
        ];

        if ($body) {
            $options['body'] = $body;
        }

        return $this->client->post($this->buildQuery($query), $options);
    }

    public function buildQuery($query)
    {
        return self::API_ENDPOINT . '/' . self::API_VERSION . '/' . $query;
    }

    public function writeDebugQuery($query)
    {
        echo '<div style="background-color: maroon; color: #fff">' . $query . '</div>';
    }


}