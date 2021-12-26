<?php

declare(strict_types=1);

namespace Talbergs\LSP\SignatureHelpClientCapabilities;

use Talbergs\LSP\DTO;
use Talbergs\LSP\SignatureHelpClientCapabilities\SignatureInformation\SignatureInformation;

/**
 * Capabilities specific to the `textDocument/signatureHelp` request.
 */
class SignatureHelpClientCapabilities extends DTO
{
    /**
     * Whether signature help supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * The client supports the following `SignatureInformation`
     * specific properties.
     */
    public ?SignatureInformation $signatureInformation = null;

    /**
     * The client supports to send additional context information for a
     * `textDocument/signatureHelp` request. A client that opts into
     * contextSupport will also support the `retriggerCharacters` on
     * `SignatureHelpOptions`.
     *
     * @since 3.15.0
     */
    public ?bool $contextSupport = null;
}
