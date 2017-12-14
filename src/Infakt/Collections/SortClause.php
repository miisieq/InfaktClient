<?php

declare(strict_types=1);

namespace Infakt\Collections;

use Infakt\Exception\LogicException;

class SortClause
{
    const ORDER_ASC = 'asc';

    const ORDER_DESC = 'desc';

    /**
     * @var string
     */
    protected $field;

    /**
     * @var string
     */
    protected $order;

    /**
     * SortClause constructor.
     *
     * @param string $field
     * @param string $order
     */
    public function __construct($field = null, $order = null)
    {
        $this->setField($field);
        $this->setOrder($order);
    }

    /**
     * @param $field
     *
     * @return $this
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * @param $order
     *
     * @throws LogicException
     *
     * @return $this
     */
    public function setOrder($order)
    {
        if (!in_array($order, [self::ORDER_ASC, self::ORDER_DESC])) {
            throw new LogicException('Invalid order argument.');
        }

        $this->order = $order;

        return $this;
    }

    /**
     * @return string
     */
    public function getOrder()
    {
        return $this->order;
    }
}
