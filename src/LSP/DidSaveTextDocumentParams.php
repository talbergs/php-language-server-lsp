<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class DidSaveTextDocumentParams extends DTO
{
    /**
     * The document that was saved.
     */
    public TextDocumentIdentifier $textDocument;

    /**
     * Optional the content when saved. Depends on the includeText value
     * when the save notification was requested.
     */
    public ?string $text = null;
}

