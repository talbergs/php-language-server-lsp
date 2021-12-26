<?php

declare(strict_types=1);

namespace Talbergs\LSP\WorkspaceSymbolClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * The client support partial workspace symbols. The client will send the
 * request `workspaceSymbol/resolve` to the server to resolve additional
 * properties.
 *
 * @since 3.17.0 - proposedState
 */
class ResolveSupport extends DTO
{
    /**
     * The properties that a client can resolve lazily. Usually
     * `location.range`
     *
     * @var string[]
     */
    public array $properties;
}
