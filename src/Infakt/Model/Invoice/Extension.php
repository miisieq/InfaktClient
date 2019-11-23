<?php

declare(strict_types=1);

namespace Infakt\Model\Invoice;

use Infakt\Model\Invoice\Extension\Payment;
use Infakt\Model\Invoice\Extension\Share;

class Extension
{
    /**
     * @var Payment
     */
    protected $payment;

    /**
     * @var Share
     */
    protected $share;

    public function getPayment(): Payment
    {
        return $this->payment;
    }

    /**
     * @return Extension
     */
    public function setPayment(Payment $payment): self
    {
        $this->payment = $payment;

        return $this;
    }

    public function getShare(): Share
    {
        return $this->share;
    }

    /**
     * @return Extension
     */
    public function setShare(Share $share): self
    {
        $this->share = $share;

        return $this;
    }
}
