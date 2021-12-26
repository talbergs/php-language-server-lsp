<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class CodeLensOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
     * Code lens has a resolve provider as well.
     */
    public ?bool $resolveProvider = null;
}
