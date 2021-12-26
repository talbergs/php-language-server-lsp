<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/formatting` request.
 */
class DocumentFormattingClientCapabilities extends DTO
{
    /**
     * Whether formatting supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
