<?php

declare(strict_types=1);

namespace Talbergs\LSP\DocumentSymbolClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Specific capabilities for the `SymbolKind` in the
 * `textDocument/documentSymbol` request.
 */
class SymbolKind extends DTO
{
    /**
     * The symbol kind values the client supports. When this
     * property exists the client also guarantees that it will
     * handle values outside its set gracefully and falls back
     * to a default value when unknown.
     *
     * If this property is not present the client only supports
     * the symbol kinds from `File` to `Array` as defined in
     * the initial version of the protocol.
     *
     * @var \Talbergs\LSP\SymbolKind[];
     */
    public ?array $valueSet = null;
}
