<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class DidOpenTextDocumentParams extends DTO
{
    /**
     * The document that was opened.
     */
    public TextDocumentItem $textDocument;
}

