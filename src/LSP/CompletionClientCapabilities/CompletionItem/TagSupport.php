<?php

declare(strict_types=1);

namespace Talbergs\LSP\CompletionClientCapabilities\CompletionItem;

use Talbergs\LSP\DTO;

/**
 * Client supports the tag property on a completion item. Clients
 * supporting tags have to handle unknown tags gracefully. Clients
 * especially need to preserve unknown tags when sending a completion
 * item back to the server in a resolve call.
 *
 * @since 3.15.0
 */
class TagSupport extends DTO
{
    /**
     * The tags supported by the client.
     *
     * @var \Talbergs\LSP\CompletionItemTag[]
     */
    public array $valueSet;
}
