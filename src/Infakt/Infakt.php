<?php

namespace Infakt;

use Infakt\Exception\ConfigurationException;
use Infakt\Repository\AbstractObjectRepository;

class Infakt
{

    /**
     * Configuration
     *
     * @var array
     */
    protected $config = [];

    /**
     * @var Client
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
    }

    /**
     * @param $className
     * @return AbstractObjectRepository
     * @throws ConfigurationException
     */
    public function getRepository($className)
    {
        $className  = 'Infakt\\Repository\\' . substr($className, strrpos($className, '\\') + 1) . 'Repository';

        if (!class_exists($className)) {
            throw new ConfigurationException("There is no repository to work with class $className.");
        }

        return new $className($this->getClient());
    }

    /**
     * Get an API client
     *
     * @return Client
     */
    protected function getClient()
    {
        if (!$this->client instanceof Client) {
            $this->client = new Client($this->config);
        }

        return $this->client;
    }
}