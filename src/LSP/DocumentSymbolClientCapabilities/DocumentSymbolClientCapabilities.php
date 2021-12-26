<?php

declare(strict_types=1);

namespace Talbergs\LSP\DocumentSymbolClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Capabilities specific to the `textDocument/documentSymbol` request.
 */
class DocumentSymbolClientCapabilities extends DTO
{
    /**
     * Whether document symbol supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * Specific capabilities for the `SymbolKind` in the
     * `textDocument/documentSymbol` request.
     */
    public ?SymbolKind $symbolKind = null;

    /**
     * The client supports hierarchical document symbols.
     */
    public ?bool $hierarchicalDocumentSymbolSupport = null;

    /**
     * The client supports tags on `SymbolInformation`. Tags are supported on
     * `DocumentSymbol` if `hierarchicalDocumentSymbolSupport` is set to true.
     * Clients supporting tags have to handle unknown tags gracefully.
     *
     * @since 3.16.0
     */
    public ?TagSupport $tagSupport = null;

    /**
     * The client supports an additional label presented in the UI when
     * registering a document symbol provider.
     *
     * @since 3.16.0
     */
    public ?bool $labelSupport = null;
}
