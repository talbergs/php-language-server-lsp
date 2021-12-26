<?php

declare(strict_types=1);

namespace Talbergs\LSP\ClientCapabilities\Workspace;

use Talbergs\LSP\DTO;
use Talbergs\LSP\WorkspaceEditClientCapabilities\WorkspaceEditClientCapabilities;
use Talbergs\LSP\DidChangeConfigurationClientCapabilities;
use Talbergs\LSP\DidChangeWatchedFilesClientCapabilities;
use Talbergs\LSP\WorkspaceSymbolClientCapabilities\WorkspaceSymbolClientCapabilities;
use Talbergs\LSP\ExecuteCommandClientCapabilities;
use Talbergs\LSP\SemanticTokensWorkspaceClientCapabilities;
use Talbergs\LSP\CodeLensWorkspaceClientCapabilities;

/**
 * Workspace specific client capabilities.
 */
class Workspace extends DTO
{
    /**
     * The client supports applying batch edits
     * to the workspace by supporting the request
     * 'workspace/applyEdit'
     */
    public ?bool $applyEdit = null;

    /**
     * Capabilities specific to `WorkspaceEdit`s
     */
    public ?WorkspaceEditClientCapabilities $workspaceEdit = null;

    /**
     * Capabilities specific to the `workspace/didChangeConfiguration`
     * notification.
     */
    public ?DidChangeConfigurationClientCapabilities $didChangeConfiguration = null;

    /**
     * Capabilities specific to the `workspace/didChangeWatchedFiles`
     * notification.
     */
    public ?DidChangeWatchedFilesClientCapabilities $didChangeWatchedFiles = null;

    /**
     * Capabilities specific to the `workspace/symbol` request.
     */
    public ?WorkspaceSymbolClientCapabilities $symbol = null;

    /**
     * Capabilities specific to the `workspace/executeCommand` request.
     */
    public ?ExecuteCommandClientCapabilities $executeCommand = null;

    /**
     * The client has support for workspace folders.
     *
     * @since 3.6.0
     */
    public ?bool $workspaceFolders = null;

    /**
     * The client supports `workspace/configuration` requests.
     *
     * @since 3.6.0
     */
    public ?bool $configuration = null;

    /**
     * Capabilities specific to the semantic token requests scoped to the
     * workspace.
     *
     * @since 3.16.0
     */
    public ?SemanticTokensWorkspaceClientCapabilities $semanticTokens = null;

    /**
     * Capabilities specific to the code lens requests scoped to the
     * workspace.
     *
     * @since 3.16.0
     */
    public ?CodeLensWorkspaceClientCapabilities $codeLens = null;

    /**
     * The client has support for file requests/notifications.
     *
     * @since 3.16.0
     */
    public ?FileOperations $fileOperations = null;
}
