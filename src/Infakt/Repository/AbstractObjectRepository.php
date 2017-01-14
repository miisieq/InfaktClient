<?php

namespace Infakt\Repository;

use Infakt\Client;
use Infakt\Collections\Criteria;
use Infakt\Collections\CollectionResult;
use Infakt\Exception\InfaktJsonDecoderException;
use Infakt\Model\AbstractEntity;
use Doctrine\Common\Inflector\Inflector;

abstract class AbstractObjectRepository implements ObjectRepositoryInterface
{

    /**
     * @var Client
     */
    protected $client;

    /**
     * Fully-qualified class name of a model
     *
     * @var string
     */
    protected $modelClass;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * Get entity by ID
     *
     * @param $entityId
     * @return AbstractEntity
     */
    public function get($entityId)
    {
        $response = $this->client->get($this->getServiceName() . '/' . $entityId . '.json');

        return $this->getModelFromRawResponse($response->getBody()->getContents());
    }


    public function create(AbstractEntity $entity)
    {
        $query = $this->getServiceName() . '.json';

        $content = \GuzzleHttp\json_encode([
            $this->getEntityName() => $entity
        ]);

        $response = $this->client->post($query, $content);

        return $this->getModelFromRawResponse($response->getBody()->getContents());
    }


    public function matching(Criteria $criteria)
    {
        $response = $this->client->get($this->buildQuery($criteria));
        $data = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        if (!(array_key_exists('metainfo', $data)
            && array_key_exists('total_count', $data['metainfo'])
            && array_key_exists('entities', $data))
        ) {
            throw new InfaktJsonDecoderException("Response does not contain required fields.");
        }

        $modelClass = $this->getModelClass();

        $collection = new CollectionResult();
        $collection->setTotalCount($data['metainfo']['total_count']);

        foreach ($data['entities'] as $entity) {
            $collection->addItemToCollection(new $modelClass($entity));
        }

        return $collection;
    }

    public function buildQuery(Criteria $criteria)
    {
        $query = $this->getServiceName() . '.json';
        $parameters = $this->buildQueryParameters($criteria);

        if ($parameters) {
            $query .= '?' . $parameters;
        }

        return $query;
    }

    public function buildQueryParameters(Criteria $criteria)
    {
        $query = '';

        foreach ($criteria->getComparisons() as $comparison) {
            if ($query) {
                $query .= '&';
            }

            $query .= 'q[' . $comparison->getField() . '_' . $comparison->getOperator() . ']=' . $comparison->getValue();
        }

        foreach ($criteria->getSortClauses() as $sortClause) {
            if ($query) {
                $query .= '&';
            }

            $query .= 'order=' . $sortClause->getField() . ' ' . $sortClause->getOrder();
        }

        if ($criteria->getFirstResult()
            || $criteria->getMaxResults()
        ) {
            if ($query) {
                $query .= '&';
            }

            $query .= 'offset=' . $criteria->getFirstResult();
            $query .= '&limit=' . $criteria->getMaxResults();
        }

        return $query;
    }

    /**
     * Get model object from raw JSON response
     *
     * @param $response
     * @return AbstractEntity
     */
    protected function getModelFromRawResponse($response)
    {
        $modelClass = $this->getModelClass();

        return new $modelClass(\GuzzleHttp\json_decode($response, true));
    }

    /**
     * Gets API service name, for example: "clients"
     *
     * @return string
     */
    protected function getServiceName()
    {
        return Inflector::pluralize($this->getEntityName());
    }

    /**
     * Gets entity name, for example: "client"
     *
     * @return string
     */
    protected function getEntityName()
    {
        return strtolower(substr($this->getModelClass(), strrpos($this->getModelClass(), '\\') + 1));
    }

    /**
     * Get fully-qualified class name of a model
     *
     * @return string
     */
    protected function getModelClass()
    {
        if (!$this->modelClass) {
            $class = substr(get_class($this), strrpos(get_class($this), '\\') + 1);
            $class = substr($class, 0, strlen($class) - strlen('Repository'));

            $this->modelClass = 'Infakt\\Model\\' . $class;
        }

        return $this->modelClass;
    }

}