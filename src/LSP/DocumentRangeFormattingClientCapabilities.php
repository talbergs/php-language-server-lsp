<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/rangeFormatting` request.
 */
class DocumentRangeFormattingClientCapabilities extends DTO
{
    /**
     * Whether formatting supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
