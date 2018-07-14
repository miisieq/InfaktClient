<?php

declare(strict_types=1);

namespace Infakt\Model\Invoice\Extension;

abstract class AbstractExtension implements ExtensionInterface
{
    /**
     * @var string
     */
    protected $link;

    /**
     * @var bool
     */
    protected $available;

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     *
     * @return $this
     */
    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    /**
     * @return bool
     */
    public function isAvailable(): bool
    {
        return $this->available;
    }

    /**
     * @param bool $available
     *
     * @return $this
     */
    public function setAvailable(bool $available): self
    {
        $this->available = $available;

        return $this;
    }
}
