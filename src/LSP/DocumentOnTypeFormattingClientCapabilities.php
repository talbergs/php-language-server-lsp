<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/** request.
 * Capabilities specific to the `textDocument/onTypeFormatting` request.
 */
class DocumentOnTypeFormattingClientCapabilities extends DTO
{
    /**
     * Whether on type formatting supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;
}
