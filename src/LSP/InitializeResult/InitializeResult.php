<?php

declare(strict_types=1);

namespace Talbergs\LSP\InitializeResult;

use Talbergs\LSP\DTO;
use Talbergs\LSP\ServerCapabilities\ServerCapabilities;

class InitializeResult extends DTO
{
    /**
     * The capabilities the language server provides.
     */
    public ServerCapabilities $capabilities;

    /**
     * Information about the server.
     *
     * @since 3.15.0
     */
    public ?ServerInfo $serverInfo = null;
}
