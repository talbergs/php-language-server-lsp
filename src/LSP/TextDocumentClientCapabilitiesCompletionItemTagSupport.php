<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class TextDocumentClientCapabilitiesCompletionItemTagSupport extends DTO
{
    /**
     * The tags supported by the client.
     *
     * @var CompletionItemTag[]
     */
    public ?array $valueSet = null;
}
