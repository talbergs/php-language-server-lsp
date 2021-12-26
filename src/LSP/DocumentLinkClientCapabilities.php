<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/documentLink` request.
 */
class DocumentLinkClientCapabilities extends DTO
{
    /**
     * Whether document link supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * Whether the client supports the `tooltip` property on `DocumentLink`.
     *
     * @since 3.15.0
     */
    public ?bool $tooltipSupport = null;
}
