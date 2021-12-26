<?php

declare(strict_types=1);

namespace Talbergs\LSP\ClientCapabilities;

use Talbergs\LSP\DTO;
use Talbergs\LSP\ShowDocumentClientCapabilities;
use Talbergs\LSP\ShowMessageRequestClientCapabilities\ShowMessageRequestClientCapabilities;

/**
 * Window specific client capabilities.
 */
class Window extends DTO
{
    /**
     * Whether client supports handling progress notifications. If set
     * servers are allowed to report in `workDoneProgress` property in the
     * request specific server capabilities.
     *
     * @since 3.15.0
     */
    public ?bool $workDoneProgress = null;

    /**
     * Capabilities specific to the showMessage request
     *
     * @since 3.16.0
     */
    public ?ShowMessageRequestClientCapabilities $showMessage = null;

    /**
     * Client capabilities for the show document request.
     *
     * @since 3.16.0
     */
    public ?ShowDocumentClientCapabilities $showDocument = null;
}
