<?php

declare(strict_types=1);

namespace Talbergs\LSP\SemanticTokensOptions;

use Talbergs\LSP\DTO;

class Full extends DTO
{
    /**
     * The server supports deltas for full documents.
     */
    public ?bool $delta = null;
}
