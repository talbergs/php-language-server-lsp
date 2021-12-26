<?php

declare(strict_types=1);

namespace Talbergs\LSP;

trait WorkspaceSymbolOptions
{
    use WorkDoneProgressOptions;

    /**
     * The server provides support to resolve additional
     * information for a workspace symbol.
     *
     * @since 3.17.0 - proposed state
     */
    public ?bool $resolveProvider = null;
}
