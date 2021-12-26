<?php

declare(strict_types=1);

namespace Talbergs\LSP\WorkspaceSymbolClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Capabilities specific to the `workspace/symbol` request.
 */
class WorkspaceSymbolClientCapabilities extends DTO
{
    /**
     * Symbol request supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * Specific capabilities for the `SymbolKind` in the `workspace/symbol`
     * request.
     */
    public ?SymbolKind $symbolKind = null;

    /**
     * The client supports tags on `SymbolInformation`.
     * Clients supporting tags have to handle unknown tags gracefully.
     *
     * @since 3.16.0
     */
    public ?TagSupport $tagSupport = null;

    /**
     * The client support partial workspace symbols. The client will send the
     * request `workspaceSymbol/resolve` to the server to resolve additional
     * properties.
     *
     * @since 3.17.0 - proposedState
     */
    public ?ResolveSupport $resolveSupport = null;
}
