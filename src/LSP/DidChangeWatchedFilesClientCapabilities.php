<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `workspace/didChangeWatchedFiles`
 * notification.
 */
class DidChangeWatchedFilesClientCapabilities extends DTO
{
    /**
     * Did change watched files notification supports dynamic registration.
     * Please note that the current protocol doesn't support static
     * configuration for file changes from the server side.
     */
    public ?bool $dynamicRegistration = null;
}
