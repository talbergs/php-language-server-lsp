<?php

declare(strict_types=1);

namespace Talbergs\LSP\ClientCapabilities\Workspace;

use Talbergs\LSP\DTO;

/**
 * The client has support for file requests/notifications.
 *
 * @since 3.16.0
 */
class FileOperations extends DTO
{
    /**
     * Whether the client supports dynamic registration for file
     * requests/notifications.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * The client has support for sending didCreateFiles notifications.
     */
    public ?bool $didCreate = null;

    /**
     * The client has support for sending willCreateFiles requests.
     */
    public ?bool $willCreate = null;

    /**
     * The client has support for sending didRenameFiles notifications.
     */
    public ?bool $didRename = null;

    /**
     * The client has support for sending willRenameFiles requests.
     */
    public ?bool $willRename = null;

    /**
     * The client has support for sending didDeleteFiles notifications.
     */
    public ?bool $didDelete = null;

    /**
     * The client has support for sending willDeleteFiles requests.
     */
    public ?bool $willDelete = null;
}
