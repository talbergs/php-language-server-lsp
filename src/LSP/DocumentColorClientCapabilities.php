<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/documentColor` and the
 * `textDocument/colorPresentation` request.
 *
 * @since 3.6.0
 */
class DocumentColorClientCapabilities extends DTO
{
    /**
     * Whether document color supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
