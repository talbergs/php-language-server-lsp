<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class DocumentSymbolOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
     * A human-readable string that is shown when multiple outlines trees
     * are shown for the same document.
     *
     * @since 3.16.0
     */
    public ?string $label = null;
}
