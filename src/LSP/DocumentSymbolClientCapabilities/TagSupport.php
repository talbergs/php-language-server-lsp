<?php

declare(strict_types=1);

namespace Talbergs\LSP\DocumentSymbolClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * The client supports tags on `SymbolInformation`. Tags are supported on
 * `DocumentSymbol` if `hierarchicalDocumentSymbolSupport` is set to true.
 * Clients supporting tags have to handle unknown tags gracefully.
 *
 * @since 3.16.0
 */
class TagSupport extends DTO
{
    /**
     * The tags supported by the client.
     *
     * @var \Talbergs\LSP\SymbolTag[];
     */
    public array $valueSet;
}
