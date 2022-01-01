<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * An item to transfer a text document from the client to the server.
 */
class TextDocumentItem extends DTO
{
    /**
     * The text document's URI.
     */
    public string $uri;

    /**
     * The text document's language identifier.
     */
    public string $languageId;

    /**
     * The version number of this document (it will increase after each
     * change, including undo/redo).
     */
    public int $version;

    /**
     * The content of the opened text document.
     */
    public string $text;
}
