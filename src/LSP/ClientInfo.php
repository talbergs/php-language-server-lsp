<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Information about the client
 *
 * @since 3.15.0
 */
class ClientInfo extends DTO
{
    /**
     * The name of the client as defined by the client.
     */
    public string $name;

    /**
     * The client's version as defined by the client.
     */
    public ?string $version = null;
}
