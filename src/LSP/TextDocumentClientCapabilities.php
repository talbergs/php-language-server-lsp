<?php

declare(strict_types=1);

namespace Talbergs\LSP;

use Talbergs\LSP\CompletionClientCapabilities\CompletionClientCapabilities;
use Talbergs\LSP\SignatureHelpClientCapabilities\SignatureHelpClientCapabilities;
use Talbergs\LSP\DocumentSymbolClientCapabilities\DocumentSymbolClientCapabilities;
use Talbergs\LSP\CodeActionClientCapabilities\CodeActionClientCapabilities;
use Talbergs\LSP\PublishDiagnosticsClientCapabilities\PublishDiagnosticsClientCapabilities;
use Talbergs\LSP\SemanticTokensClientCapabilities\SemanticTokensClientCapabilities;

/**
 * Text document specific client capabilities.
 */
class TextDocumentClientCapabilities extends DTO
{
    public ?TextDocumentSyncClientCapabilities $synchronization = null;

    /**
     * Capabilities specific to the `textDocument/completion` request.
     */
    public ?CompletionClientCapabilities $completion = null;

    /**
     * Capabilities specific to the `textDocument/hover` request.
     */
    public ?HoverClientCapabilities $hover = null;

    /**
     * Capabilities specific to the `textDocument/signatureHelp` request.
     */
    public ?SignatureHelpClientCapabilities $signatureHelp = null;

    /**
     * Capabilities specific to the `textDocument/declaration` request.
     *
     * @since 3.14.0
     */
    public ?DeclarationClientCapabilities $declaration = null;

    /**
     * Capabilities specific to the `textDocument/definition` request.
     */
    public ?DefinitionClientCapabilities $definition = null;

    /**
     * Capabilities specific to the `textDocument/typeDefinition` request.
     *
     * @since 3.6.0
     */
    public ?TypeDefinitionClientCapabilities $typeDefinition = null;

    /**
     * Capabilities specific to the `textDocument/implementation` request.
     *
     * @since 3.6.0
     */
    public ?ImplementationClientCapabilities $implementation = null;

    /**
     * Capabilities specific to the `textDocument/references` request.
     */
    public ?ReferenceClientCapabilities $references = null;

    /**
     * Capabilities specific to the `textDocument/documentHighlight` request.
     */
    public ?DocumentHighlightClientCapabilities $documentHighlight = null;

    /**
     * Capabilities specific to the `textDocument/documentSymbol` request.
     */
    public ?DocumentSymbolClientCapabilities $documentSymbol = null;

    /*
     * Capabilities specific to the `textDocument/codeAction` request.
     */
    public ?CodeActionClientCapabilities $codeAction = null;

    /**
     * Capabilities specific to the `textDocument/codeLens` request.
     */
    public ?CodeLensClientCapabilities $codeLens = null;

    /**
     * Capabilities specific to the `textDocument/documentLink` request.
     */
    public ?DocumentLinkClientCapabilities $documentLink = null;

    /**
     * Capabilities specific to the `textDocument/documentColor` and the
     * `textDocument/colorPresentation` request.
     *
     * @since 3.6.0
     */
    public ?DocumentColorClientCapabilities $colorProvider = null;

    /**
     * Capabilities specific to the `textDocument/formatting` request.
     */
    public ?DocumentFormattingClientCapabilities $formatting = null;

    /**
     * Capabilities specific to the `textDocument/rangeFormatting` request.
     */
    public ?DocumentRangeFormattingClientCapabilities $rangeFormatting = null;

    /** request.
     * Capabilities specific to the `textDocument/onTypeFormatting` request.
     */
    public ?DocumentOnTypeFormattingClientCapabilities $onTypeFormatting = null;

    /**
     * Capabilities specific to the `textDocument/rename` request.
     */
    public ?RenameClientCapabilities $rename = null;

    /**
     * Capabilities specific to the `textDocument/publishDiagnostics`
     * notification.
     */
    public ?PublishDiagnosticsClientCapabilities $publishDiagnostics = null;

    /**
     * Capabilities specific to the `textDocument/foldingRange` request.
     *
     * @since 3.10.0
     */
    public ?FoldingRangeClientCapabilities $foldingRange = null;

    /**
     * Capabilities specific to the `textDocument/selectionRange` request.
     *
     * @since 3.15.0
     */
    public ?SelectionRangeClientCapabilities $selectionRange = null;

    /**
     * Capabilities specific to the `textDocument/linkedEditingRange` request.
     *
     * @since 3.16.0
     */
    public ?LinkedEditingRangeClientCapabilities $linkedEditingRange = null;

    /**
     * Capabilities specific to the various call hierarchy requests.
     *
     * @since 3.16.0
     */
    public ?CallHierarchyClientCapabilities $callHierarchy = null;

    /**
     * Capabilities specific to the various semantic token requests.
     *
     * @since 3.16.0
     */
    public ?SemanticTokensClientCapabilities $semanticTokens = null;

    /**
     * Capabilities specific to the `textDocument/moniker` request.
     *
     * @since 3.16.0
     */
    public ?MonikerClientCapabilities $moniker = null;
}
