<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * The result of a hover request.
 */
class Hover extends DTO
{
    /**
     * The hover's content
     *
     * TODO: test union cast array or object
     *
     * @var MarkedString[]
     */
    public array|MarkupContent $contents; 

    /**
     * An optional range is a range inside a text document
     * that is used to visualize a hover, e.g. by changing the background color.
     */
    public ?Range $range = null;
}

