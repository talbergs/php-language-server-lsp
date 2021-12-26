<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/implementation` request.
 *
 * @since 3.6.0
 */
class ImplementationClientCapabilities extends DTO
{
    /**
     * Whether implementation supports dynamic registration. If this is set to
     * `true` the client supports the new `ImplementationRegistrationOptions`
     * return value for the corresponding server capability as well.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * The client supports additional metadata in the form of definition links.
     *
     * @since 3.14.0
     */
    public ?bool $linkSupport = null;
}
