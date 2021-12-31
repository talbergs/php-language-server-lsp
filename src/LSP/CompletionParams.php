<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class CompletionParams extends DTO
{
    use TextDocumentPositionParams;
    use WorkDoneProgressParams;

    /**
     * The completion context. This is only available if the client specifies
     * to send this using the client capability
     * `completion.contextSupport === true`
     */
    public ?CompletionContext $context = null;
}

