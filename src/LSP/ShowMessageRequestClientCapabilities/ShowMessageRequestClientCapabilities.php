<?php

declare(strict_types=1);

namespace Talbergs\LSP\ShowMessageRequestClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Capabilities specific to the showMessage request
 *
 * @since 3.16.0
 */
class ShowMessageRequestClientCapabilities extends DTO
{
    /**
     * Capabilities specific to the `MessageActionItem` type.
     */
    public ?MessageActionItem $messageActionItem = null;
}
