<?php

declare(strict_types=1);

namespace Talbergs\LSP\ShowMessageRequestClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Capabilities specific to the `MessageActionItem` type.
 */
class MessageActionItem extends DTO
{
    /**
     * Whether the client supports additional attributes which
     * are preserved and sent back to the server in the
     * request's response.
     */
    public ?bool $additionalPropertiesSupport = null;
}
