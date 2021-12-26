<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class DocumentLinkOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
     * Document links have a resolve provider as well.
     */
    public ?bool $resolveProvider = null;
}
