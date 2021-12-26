<?php

declare(strict_types=1);

namespace Talbergs\LSP\SignatureHelpClientCapabilities\SignatureInformation;

use Talbergs\LSP\DTO;
use Talbergs\LSP\SignatureHelpClientCapabilities\SignatureInformation\ParameterInformation;

/**
 * The client supports the following `SignatureInformation`
 * specific properties.
 */
class SignatureInformation extends DTO
{
    /**
     * Client supports the follow content formats for the documentation
     * property. The order describes the preferred format of the client.
     *
     * @var \Talbergs\LSP\MarkupKind[]
     */
    public ?array $documentationFormat = null;

    /**
     * Client capabilities specific to parameter information.
     */
    public ?ParameterInformation $parameterInformation = null;

    /**
     * The client supports the `activeParameter` property on
     * `SignatureInformation` literal.
     *
     * @since 3.16.0
     */
    public ?bool $activeParameterSupport = null;
}
