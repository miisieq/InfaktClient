<?php

namespace Infakt\Model;

use Doctrine\Common\Inflector\Inflector;

abstract class AbstractEntity implements \JsonSerializable
{

    public function __construct(array $data = [])
    {
        foreach ($data as $key => $value) {
            $methodName = 'set' . Inflector::classify($key);

            if (method_exists($this, $methodName)) {
                $this->$methodName($value);
            } else {
                throw new \LogicException('Method ' . $methodName . '() does not exist in class ' . get_class($this));
            }

        }
    }

    public function jsonSerialize()
    {
        $data = [];

        $reflection = new \ReflectionClass($this);

        foreach ($reflection->getProperties() as $reflectionProperty) {
            $methodName = ucfirst($reflectionProperty->getName());

            if ($reflection->hasMethod('get' . $methodName)) {
                $methodName = 'get' . $methodName;

            } elseif($reflection->hasMethod('is' . $methodName)) {
                $methodName = 'is' . $methodName;
            } else {
                continue;
            }

            $value = $this->$methodName();

            if ($value) {
                $data[Inflector::tableize($reflectionProperty->getName())] = $value;
            }
        }

        return $data;
    }

}