<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the code lens requests scoped to the
 * workspace.
 *
 * @since 3.16.0
 */
class CodeLensWorkspaceClientCapabilities extends DTO
{
    /**
     * Whether the client implementation supports a refresh request sent from the
     * server to the client.
     *
     * Note that this event is global and will force the client to refresh all
     * code lenses currently shown. It should be used with absolute care and is
     * useful for situation where a server for example detect a project wide
     * change that requires such a calculation.
     */
    public ?bool $refreshSupport = null;
}
