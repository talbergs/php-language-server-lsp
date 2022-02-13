<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class TextDocumentContentChangeEvent extends DTO
{
    /**
     * The range of the document that changed.
     */
    public ?Range $range = null;

    /**
     * The optional length of the range that got replaced.
     *
     * @deprecated use range instead.
     */
    public ?int $rangeLength = null;

    /**
     * The new text for the provided range.
     * OR
     * The new text of the whole document.
     */
    public string $text;
}
