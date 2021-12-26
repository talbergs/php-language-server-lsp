<?php

declare(strict_types=1);

namespace Talbergs\LSP\SignatureHelpClientCapabilities\SignatureInformation;

use Talbergs\LSP\DTO;

/**
 * Client capabilities specific to parameter information.
 */
class ParameterInformation extends DTO
{
    /**
     * The client supports processing label offsets instead of a
     * simple label string.
     *
     * @since 3.14.0
     */
    public ?bool $labelOffsetSupport = null;
}
