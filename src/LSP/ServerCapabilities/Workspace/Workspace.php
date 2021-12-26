<?php

declare(strict_types=1);

namespace Talbergs\LSP\ServerCapabilities\Workspace;

use Talbergs\LSP\DTO;
use Talbergs\LSP\WorkspaceFoldersServerCapabilities;

/**
 * Workspace specific server capabilities
 */
class Workspace extends DTO
{
    /**
     * The server supports workspace folder.
     *
     * @since 3.6.0
     */
    public ?WorkspaceFoldersServerCapabilities $workspaceFolders = null;

    /**
     * The server is interested in file notifications/requests.
     *
     * @since 3.16.0
     */
    public ?FileOperations $fileOperations = null;
}
