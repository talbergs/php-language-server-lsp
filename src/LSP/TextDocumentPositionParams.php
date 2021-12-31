<?php

declare(strict_types=1);

namespace Talbergs\LSP;

trait TextDocumentPositionParams
{
    /**
     * The text document.
     */
    public TextDocumentIdentifier $textDocument;

    /**
     * The position inside the text document.
     */
    public Position $position;
}
