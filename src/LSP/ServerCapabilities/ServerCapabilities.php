<?php

declare(strict_types=1);

namespace Talbergs\LSP\ServerCapabilities;

use Talbergs\LSP\DTO;
use Talbergs\LSP\ServerCapabilities\Workspace\Workspace;
use Talbergs\LSP\TextDocumentSyncOptions;
use Talbergs\LSP\TextDocumentSyncKind;
use Talbergs\LSP\CompletionOptions\CompletionOptions;
use Talbergs\LSP\HoverOptions;
use Talbergs\LSP\SignatureHelpOptions;
use Talbergs\LSP\DeclarationOptions;
use Talbergs\LSP\DeclarationRegistrationOptions;
use Talbergs\LSP\DefinitionOptions;
use Talbergs\LSP\TypeDefinitionOptions;
use Talbergs\LSP\TypeDefinitionRegistrationOptions;
use Talbergs\LSP\ImplementationOptions;
use Talbergs\LSP\ImplementationRegistrationOptions;
use Talbergs\LSP\ReferenceOptions;
use Talbergs\LSP\DocumentHighlightOptions;
use Talbergs\LSP\DocumentSymbolOptions;
use Talbergs\LSP\CodeActionOptions;
use Talbergs\LSP\CodeLensOptions;
use Talbergs\LSP\DocumentLinkOptions;
use Talbergs\LSP\DocumentColorOptions;
use Talbergs\LSP\DocumentColorRegistrationOptions;
use Talbergs\LSP\DocumentFormattingOptions;
use Talbergs\LSP\DocumentRangeFormattingOptions;
use Talbergs\LSP\DocumentOnTypeFormattingOptions;
use Talbergs\LSP\RenameOptions;
use Talbergs\LSP\FoldingRangeOptions;
use Talbergs\LSP\FoldingRangeRegistrationOptions;
use Talbergs\LSP\ExecuteCommandOptions;
use Talbergs\LSP\SelectionRangeOptions;
use Talbergs\LSP\SelectionRangeRegistrationOptions;
use Talbergs\LSP\LinkedEditingRangeOptions;
use Talbergs\LSP\LinkedEditingRangeRegistrationOptions;
use Talbergs\LSP\CallHierarchyOptions;
use Talbergs\LSP\CallHierarchyRegistrationOptions;
use Talbergs\LSP\SemanticTokensOptions\SemanticTokensOptions;
use Talbergs\LSP\SemanticTokensRegistrationOptions;
use Talbergs\LSP\MonikerOptions;
use Talbergs\LSP\MonikerRegistrationOptions;
use Talbergs\LSP\WorkspaceSymbolOptions;

/**
 * The capabilities the language server provides.
 */
class ServerCapabilities extends DTO
{
    /**
	 * Defines how text documents are synced. Is either a detailed structure
	 * defining each notification or for backwards compatibility the
	 * TextDocumentSyncKind number. If omitted it defaults to
	 * `TextDocumentSyncKind.None`.
	 */
	public null|TextDocumentSyncOptions|TextDocumentSyncKind $textDocumentSync = null;

	/**
	 * The server provides completion support.
	 */
	public ?CompletionOptions $completionProvider = null;

	/**
	 * The server provides hover support.
	 */
	public null|bool|HoverOptions $hoverProvider = null;

	/**
	 * The server provides signature help support.
	 */
	public ?SignatureHelpOptions $signatureHelpProvider = null;

	/**
	 * The server provides go to declaration support.
	 *
	 * @since 3.14.0
	 */
	public null|bool|DeclarationOptions|DeclarationRegistrationOptions $declarationProvider = null;

	/**
	 * The server provides goto definition support.
	 */
	public null|bool|DefinitionOptions $definitionProvider = null;

	/**
	 * The server provides goto type definition support.
	 *
	 * @since 3.6.0
	 */
	public null|bool|TypeDefinitionOptions|TypeDefinitionRegistrationOptions $typeDefinitionProvider = null;

	/**
	 * The server provides goto implementation support.
	 *
	 * @since 3.6.0
	 */
	public null|bool|ImplementationOptions|ImplementationRegistrationOptions $implementationProvider = null;

	/**
	 * The server provides find references support.
	 */
	public null|bool|ReferenceOptions $referencesProvider = null;

	/**
	 * The server provides document highlight support.
	 */
	public null|bool|DocumentHighlightOptions $documentHighlightProvider = null;

	/**
	 * The server provides document symbol support.
	 */
	public null|bool|DocumentSymbolOptions $documentSymbolProvider = null;

	/**
	 * The server provides code actions. The `CodeActionOptions` return type is
	 * only valid if the client signals code action literal support via the
	 * property `textDocument.codeAction.codeActionLiteralSupport`.
	 */
	public null|bool|CodeActionOptions $codeActionProvider = null;

	/**
	 * The server provides code lens.
	 */
	public ?CodeLensOptions $codeLensProvider = null;

	/**
	 * The server provides document link support.
	 */
	public ?DocumentLinkOptions $documentLinkProvider = null;

	/**
	 * The server provides color provider support.
	 *
	 * @since 3.6.0
	 */
	public null|bool|DocumentColorOptions|DocumentColorRegistrationOptions $colorProvider = null;

	/**
	 * The server provides document formatting.
	 */
	public null|bool|DocumentFormattingOptions $documentFormattingProvider = null;

	/**
	 * The server provides document range formatting.
	 */
	public null|bool|DocumentRangeFormattingOptions $documentRangeFormattingProvider = null;

	/**
	 * The server provides document formatting on typing.
	 */
	public ?DocumentOnTypeFormattingOptions $documentOnTypeFormattingProvider = null;

	/**
	 * The server provides rename support. RenameOptions may only be
	 * specified if the client states that it supports
	 * `prepareSupport` in its initial `initialize` request.
	 */
	public null|bool|RenameOptions $renameProvider = null;

	/**
	 * The server provides folding provider support.
	 *
	 * @since 3.10.0
	 */
	public null|bool|FoldingRangeOptions|FoldingRangeRegistrationOptions $foldingRangeProvider = null;

	/**
	 * The server provides execute command support.
	 */
	public ?ExecuteCommandOptions $executeCommandProvider = null;

	/**
	 * The server provides selection range support.
	 *
	 * @since 3.15.0
	 */
	public null|bool|SelectionRangeOptions|SelectionRangeRegistrationOptions $selectionRangeProvider = null;

	/**
	 * The server provides linked editing range support.
	 *
	 * @since 3.16.0
	 */
	public null|bool|LinkedEditingRangeOptions|LinkedEditingRangeRegistrationOptions $linkedEditingRangeProvider = null;

	/**
	 * The server provides call hierarchy support.
	 *
	 * @since 3.16.0
	 */
	public null|bool|CallHierarchyOptions|CallHierarchyRegistrationOptions $callHierarchyProvider = null;

	/**
	 * The server provides semantic tokens support.
	 *
	 * @since 3.16.0
	 */
	public null|SemanticTokensOptions|SemanticTokensRegistrationOptions $semanticTokensProvider = null;

	/**
	 * Whether server provides moniker support.
	 *
	 * @since 3.16.0
	 */
	public null|bool|MonikerOptions|MonikerRegistrationOptions $monikerProvider = null;

	/**
	 * The server provides workspace symbol support.
	 */
	public null|bool|WorkspaceSymbolOptions $workspaceSymbolProvider = null;

	/**
	 * Workspace specific server capabilities
	 */
	public ?Workspace $workspace = null;

	/**
	 * Experimental server capabilities.
	 */
	public mixed $experimental = null;
}
