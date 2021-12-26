<?php

declare(strict_types=1);

namespace Talbergs\LSP\PublishDiagnosticsClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Capabilities specific to the `textDocument/publishDiagnostics`
 * notification.
 */
class PublishDiagnosticsClientCapabilities extends DTO
{
    /**
     * Whether the clients accepts diagnostics with related information.
     */
    public ?bool $relatedInformation = null;

    /**
     * Client supports the tag property to provide meta data about a diagnostic.
     * Clients supporting tags have to handle unknown tags gracefully.
     *
     * @since 3.15.0
     */
    public ?TagSupport $tagSupport;

    /**
     * Whether the client interprets the version property of the
     * `textDocument/publishDiagnostics` notification's parameter.
     *
     * @since 3.15.0
     */
    public ?bool $versionSupport = null;

    /**
     * Client supports a codeDescription property
     *
     * @since 3.16.0
     */
    public ?bool $codeDescriptionSupport = null;

    /**
     * Whether code action supports the `data` property which is
     * preserved between a `textDocument/publishDiagnostics` and
     * `textDocument/codeAction` request.
     *
     * @since 3.16.0
     */
    public ?bool $dataSupport = null;
}
