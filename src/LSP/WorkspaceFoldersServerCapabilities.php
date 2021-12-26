<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the code lens requests scoped to the
 * workspace.
 *
 * @since 3.16.0
 */
class WorkspaceFoldersServerCapabilities extends DTO
{
    /**
     * The server has support for workspace folders
     */
    public ?bool $supported = null;

    /**
     * Whether the server wants to receive workspace folder
     * change notifications.
     *
     * If a string is provided, the string is treated as an ID
     * under which the notification is registered on the client
     * side. The ID can be used to unregister for these events
     * using the `client/unregisterCapability` request.
     */
    public null|string|bool $changeNotifications = null;
}
