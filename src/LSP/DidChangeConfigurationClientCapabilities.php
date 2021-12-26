<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `workspace/didChangeConfiguration`
 * notification.
 */
class DidChangeConfigurationClientCapabilities extends DTO
{
    /**
     * Did change configuration notification supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
