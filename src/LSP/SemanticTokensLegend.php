<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class SemanticTokensLegend extends DTO
{
    /**
     * The token types a server uses.
     *
     * @var string[]
     */
    public array $tokenTypes;

    /**
     * The token modifiers a server uses.
     *
     * @var string[]
     */
    public array $tokenModifiers;
}
