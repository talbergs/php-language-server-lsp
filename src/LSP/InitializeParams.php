<?php

declare(strict_types=1);

namespace Talbergs\LSP;

use Talbergs\LSP\ClientCapabilities\ClientCapabilities;

/**
 * @link https://microsoft.github.io/language-server-protocol/specifications/specification-3-17/#initializeParams
 */
class InitializeParams extends DTO
{
    use WorkDoneProgressParams;

    /**
     * The process Id of the parent process that started the server. Is null if
     * the process has not been started by another process. If the parent
     * process is not alive then the server should exit (see exit notification)
     * its process.
     */
    public ?int $processId = null;

    /**
     * Information about the client
     *
     * @since 3.15.0
     */
    public ?ClientInfo $clientInfo = null;

    /**
     * The locale the client is currently showing the user interface
     * in. This must not necessarily be the locale of the operating
     * system.
     *
     * Uses IETF language tags as the value's syntax
     * (See https://en.wikipedia.org/wiki/IETF_language_tag)
     *
     * @since 3.16.0
     */
    public ?string $locale = null;

    /**
     * User provided initialization options.
     */
    public mixed $initializationOptions = null;

    /**
     * The capabilities provided by the client (editor or tool)
     *
     * @link https://microsoft.github.io/language-server-protocol/specifications/specification-3-17/#clientCapabilities
     */
    public ClientCapabilities $capabilities;

    /**
     * The initial trace setting. If omitted trace is disabled ('off').
     */
    public ?TraceValue $trace = null;

    /**
     * The workspace folders configured in the client when the server starts.
     * This property is only available if the client supports workspace folders.
     * It can be `null` if the client supports workspace folders but none are
     * configured.
     *
     * @since 3.6.0
     *
     * @var WorkspaceFolder[]
     */
    public ?array $workspaceFolders = null;

    /**
	 * The rootPath of the workspace. Is null
	 * if no folder is open.
	 *
	 * @deprecated in favour of `rootUri`.
	 */
	public ?string $rootPath = null;

    /**
	 * The rootUri of the workspace. Is null if no
	 * folder is open. If both `rootPath` and `rootUri` are set
	 * `rootUri` wins.
	 *
	 * @deprecated in favour of `workspaceFolders`
	 */
	public ?string $rootUri = null;
}
