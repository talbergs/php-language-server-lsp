<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/codeLens` request.
 */
class CodeLensClientCapabilities extends DTO
{
    /**
     * Whether code lens supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
