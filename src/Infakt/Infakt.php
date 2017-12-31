<?php

namespace Infakt;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Infakt\Exception\ConfigurationException;
use Infakt\Repository\AbstractObjectRepository;

class Infakt
{
    const API_ENDPOINT = 'https://api.infakt.pl';

    const API_VERSION = 'v3';

    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * Client constructor.
     *
     * @param ClientInterface|null $client
     * @param array                $config
     *
     * @throws ConfigurationException
     */
    public function __construct(ClientInterface $client = null, array $config = [])
    {
        if (!isset($config['api_key'])) {
            throw new ConfigurationException('Required "api_key" key not supplied in the config.');
        }

        $this->apiKey = $config['api_key'];
        $this->client = $client instanceof ClientInterface ? $client : new Client();
    }

    /**
     * @param $className
     *
     * @throws ConfigurationException
     *
     * @return AbstractObjectRepository
     */
    public function getRepository($className)
    {
        $className = 'Infakt\\Repository\\'.substr($className, strrpos($className, '\\') + 1).'Repository';

        if (!class_exists($className)) {
            throw new ConfigurationException("There is no repository to work with class $className.");
        }

        return new $className($this);
    }

    /**
     * Finds an entity by its identifier.
     *
     * @param string $className
     * @param int    $id
     *
     * @return Model\EntityInterface|null the entity instance or NULL if the entity can not be found
     */
    public function find(string $className, int $id)
    {
        return $this->getRepository($className)->get($id);
    }

    /**
     * Send HTTP GET request.
     *
     * @param string $query
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function get(string $query)
    {
        return $this->client->request('get', $this->buildQuery($query), ['headers' => $this->getAuthorizationHeader()]);
    }

    /**
     * Send HTTP DELETE request.
     *
     * @param string $query
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function delete(string $query)
    {
        return $this->client->request('delete', $this->buildQuery($query), ['headers' => $this->getAuthorizationHeader()]);
    }

    /**
     * Send HTTP POST request.
     *
     * @param string      $query
     * @param null|string $body
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(string $query, ?string $body = null)
    {
        $options = [
            'headers' => $this->getAuthorizationHeader(),
        ];

        if ($body) {
            $options['body'] = $body;
        }

        return $this->client->request('post', $this->buildQuery($query), $options);
    }

    /**
     * Attach endpoint URL to the query.
     *
     * @param string $query
     *
     * @return string
     */
    public function buildQuery(string $query)
    {
        return self::API_ENDPOINT.'/'.self::API_VERSION.'/'.$query;
    }

    /**
     * @return array
     */
    protected function getAuthorizationHeader()
    {
        return [
            'X-inFakt-ApiKey' => $this->apiKey,
        ];
    }
}
