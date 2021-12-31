<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * A special text edit to provide an insert and a replace operation.
 *
 * @since 3.16.0
 */
class InsertReplaceEdit extends DTO
{
    /**
     * The string to be inserted.
     */
    public string $newText;

    /**
     * The range if the insert is requested
     */
    public Range $insert;

    /**
     * The range if the replace is requested.
     */
    public Range $replace;
}
