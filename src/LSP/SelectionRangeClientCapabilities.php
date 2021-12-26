<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/selectionRange` request.
 *
 * @since 3.15.0
 */
class SelectionRangeClientCapabilities extends DTO
{
    /**
     * Whether implementation supports dynamic registration for selection range
     * providers. If this is set to `true` the client supports the new
     * `SelectionRangeRegistrationOptions` return value for the corresponding
     * server capability as well.
     */
    public ?bool $dynamicRegistration = null;
}
