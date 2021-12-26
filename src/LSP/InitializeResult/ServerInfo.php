<?php

declare(strict_types=1);

namespace Talbergs\LSP\InitializeResult;

use Talbergs\LSP\DTO;

/**
 * Information about the server.
 *
 * @since 3.15.0
 */
class ServerInfo extends DTO
{
    /**
     * The name of the server as defined by the server.
     */
    public string $name;

    /**
     * The server's version as defined by the server.
     */
    public ?string $version = null;
}
