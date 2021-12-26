<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `workspace/executeCommand` request.
 */
class ExecuteCommandClientCapabilities extends DTO
{
    /**
     * Execute command supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
