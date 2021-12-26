<?php

declare(strict_types=1);

namespace Talbergs\LSP\ClientCapabilities;

use Talbergs\LSP\ClientCapabilities\Workspace\Workspace;
use Talbergs\LSP\ClientCapabilities\Window;
use Talbergs\LSP\ClientCapabilities\General\General;
use Talbergs\LSP\TextDocumentClientCapabilities;
use Talbergs\LSP\DTO;

/**
 * The capabilities provided by the client (editor or tool)
 */
class ClientCapabilities extends DTO
{
    /**
     * Workspace specific client capabilities.
     */
    public ?Workspace $workspace = null;

    /**
     * Text document specific client capabilities.
     */
    public ?TextDocumentClientCapabilities $textDocument = null;

    /**
     * Window specific client capabilities.
     */
    public ?Window $window = null;

    /**
     * General client capabilities.
     *
     * @since 3.16.0
     */
    public ?General $general = null;

    /**
     * Experimental client capabilities.
     *
     * TODO test mixed type DTO cast
     */
    public mixed $experimental = null;
}
