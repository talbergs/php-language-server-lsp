<?php

declare(strict_types=1);

namespace Talbergs\LSP\SemanticTokensOptions;

use Talbergs\LSP\DTO;
use Talbergs\LSP\WorkDoneProgressOptions;
use Talbergs\LSP\SemanticTokensLegend;

class SemanticTokensOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
     * The legend used by the server
     */
    public SemanticTokensLegend $legend;

    /**
     * Server supports providing semantic tokens for a specific range
     * of a document.
     */
    public null|bool|Range $range = null;

    /**
     * Server supports providing semantic tokens for a full document.
     */
    public null|bool|Full $full = null;
}
