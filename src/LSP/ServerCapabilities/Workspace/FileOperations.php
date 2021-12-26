<?php

declare(strict_types=1);

namespace Talbergs\LSP\ServerCapabilities\Workspace;

use Talbergs\LSP\DTO;
use Talbergs\LSP\FileOperationRegistrationOptions;

/**
 * The server is interested in file notifications/requests.
 *
 * @since 3.16.0
 */
class FileOperations extends DTO
{
    /**
     * The server is interested in receiving didCreateFiles
     * notifications.
     */
    public ?FileOperationRegistrationOptions $didCreate = null;

    /**
     * The server is interested in receiving willCreateFiles requests.
     */
    public ?FileOperationRegistrationOptions $willCreate = null;

    /**
     * The server is interested in receiving didRenameFiles
     * notifications.
     */
    public ?FileOperationRegistrationOptions $didRename = null;

    /**
     * The server is interested in receiving willRenameFiles requests.
     */
    public ?FileOperationRegistrationOptions $willRename = null;

    /**
     * The server is interested in receiving didDeleteFiles file
     * notifications.
     */
    public ?FileOperationRegistrationOptions $didDelete = null;

    /**
     * The server is interested in receiving willDeleteFiles file
     * requests.
     */
    public ?FileOperationRegistrationOptions $willDelete = null;
}
