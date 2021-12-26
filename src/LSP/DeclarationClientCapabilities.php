<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/declaration` request.
 *
 * @since 3.14.0
 */
class DeclarationClientCapabilities extends DTO
{
    /**
     * Whether declaration supports dynamic registration. If this is set to
     * `true` the client supports the new `DeclarationRegistrationOptions`
     * return value for the corresponding server capability as well.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * The client supports additional metadata in the form of declaration links.
     */
    public ?bool $linkSupport = null;
}
