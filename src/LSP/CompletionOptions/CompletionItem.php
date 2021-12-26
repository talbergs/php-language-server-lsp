<?php

declare(strict_types=1);

namespace Talbergs\LSP\CompletionOptions;

use Talbergs\LSP\DTO;

/**
 * The server supports the following `CompletionItem` specific
 * capabilities.
 *
 * @since 3.17.0 - proposed state
 */
class CompletionItem extends DTO
{
    /**
     * The server has support for completion item label
     * details (see also `CompletionItemLabelDetails`) when receiving
     * a completion item in a resolve call.
     *
     * @since 3.17.0 - proposed state
     */
    public bool $labelDetailsSupport = null;
}
