<?php

declare(strict_types=1);

namespace Talbergs\LSP;

trait WorkDoneProgressParams
{
    /**
     * An optional token that a server can use to report work done progress.
     */
    public null|int|string $workDoneToken = null;
}
