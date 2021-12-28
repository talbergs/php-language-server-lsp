<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * A range in a text document expressed as (zero-based) start and end
 * positions. A range is comparable to a selection in an editor. Therefore the
 * end position is exclusive. If you want to specify a range that contains a
 * line including the line ending character(s) then use an end position
 * denoting the start of the next line. For example:
 */
class Range extends DTO
{
    /**
     * The range's start position.
     */
    public Position $start;

    /**
     * The range's end position.
     */
    public Position $end;
}
