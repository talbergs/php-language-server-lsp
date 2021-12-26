<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/definition` request.
 */
class DefinitionClientCapabilities extends DTO
{
    /**
     * Whether definition supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * The client supports additional metadata in the form of definition links.
     *
     * @since 3.14.0
     */
    public ?bool $linkSupport = null;
}
