<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Position in a text document expressed as zero-based line and zero-based
 * character offset. A position is between two characters like an ‘insert’
 * cursor in an editor. Special values like for example -1 to denote the end of
 * a line are not supported.
 */
class Position extends DTO
{
    /**
     * Line position in a document (zero-based).
     */
    public int $line;

    /**
     * Character offset on a line in a document (zero-based). Assuming that
     * the line is represented as a string, the `character` value represents
     * the gap between the `character` and `character + 1`.
     *
     * If the character value is greater than the line length it defaults back
     * to the line length.
     */
    public int $character;
}
