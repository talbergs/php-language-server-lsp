<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/references` request.
 */
class ReferenceClientCapabilities extends DTO
{
    /**
     * Whether references supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
