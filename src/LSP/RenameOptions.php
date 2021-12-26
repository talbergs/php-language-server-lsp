<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class RenameOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
     * Renames should be checked and tested before being executed.
     */
    public ?bool $prepareProvider = null;
}
