<?php

declare(strict_types=1);

namespace Infakt\Model\Invoice;

/**
 * Class representing an invoice status.
 */
class Status
{
    const DRAFT = 'draft';

    const SENT = 'sent';

    const PRINTED = 'printed';

    const PAID = 'paid';
}
