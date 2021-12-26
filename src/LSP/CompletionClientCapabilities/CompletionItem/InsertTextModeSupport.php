<?php

declare(strict_types=1);

namespace Talbergs\LSP\CompletionClientCapabilities\CompletionItem;

use Talbergs\LSP\DTO;

class InsertTextModeSupport extends DTO
{
    /**
     * @var \Talbergs\LSP\InsertTextMode[]
     */
    public array $valueSet;
}
