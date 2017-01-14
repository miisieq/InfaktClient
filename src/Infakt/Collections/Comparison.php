<?php

namespace Infakt\Collections;

class Comparison
{
    const EQ        = 'eq';
    const LT        = 'lt';
    const LTE       = 'lteq';
    const GT        = 'gt';
    const GTE       = 'gteq';
    const CONTAINS  = 'cont';

    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $op;

    /**
     * @var string
     */
    private $value;

    /**
     * @param string $field
     * @param string $operator
     * @param mixed  $value
     */
    public function __construct($field, $operator, $value)
    {
        $this->field = $field;
        $this->op = $operator;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function getOperator()
    {
        return $this->op;
    }

}
