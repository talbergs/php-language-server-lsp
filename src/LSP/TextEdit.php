<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class TextEdit extends DTO
{
    /**
     * The range of the text document to be manipulated. To insert
     * text into a document create a range where start === end.
     */
    public Range $range;

    /**
     * The string to be inserted. For delete operations use an
     * empty string.
     */
    public string $newText;
}
