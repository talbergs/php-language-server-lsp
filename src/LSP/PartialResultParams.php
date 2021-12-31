<?php

declare(strict_types=1);

namespace Talbergs\LSP;

trait PartialResultParams
{
    /**
     * An optional token that a server can use to report partial results (e.g.
     * streaming) to the client.
     */
    public null|int|string $partialResultToken = null;
}
