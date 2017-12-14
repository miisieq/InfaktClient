<?php
declare(strict_types=1);

namespace Infakt\Model;

interface EntityInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @param $id
     * @return $this
     */
    public function setId(int $id);
}
