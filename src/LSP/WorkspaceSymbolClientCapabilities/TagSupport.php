<?php

declare(strict_types=1);

namespace Talbergs\LSP\WorkspaceSymbolClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * The client supports tags on `SymbolInformation`.
 * Clients supporting tags have to handle unknown tags gracefully.
 *
 * @since 3.16.0
 */
class TagSupport extends DTO
{
    /**
     * The tags supported by the client.
     *
     * @var \Talbergs\LSP\SymbolTag[];
     */
    public ?array $valueSet = null;
}
