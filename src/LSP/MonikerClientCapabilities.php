<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/moniker` request.
 *
 * @since 3.16.0
 */
class MonikerClientCapabilities extends DTO
{
    /**
     * Whether implementation supports dynamic registration. If this is set to
     * `true` the client supports the new `(TextDocumentRegistrationOptions &
     * StaticRegistrationOptions)` return value for the corresponding server
     * capability as well.
     */
    public ?bool $dynamicRegistration = null;
}
