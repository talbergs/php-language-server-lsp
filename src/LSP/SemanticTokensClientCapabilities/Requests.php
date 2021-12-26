<?php

declare(strict_types=1);

namespace Talbergs\LSP\SemanticTokensClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Which requests the client supports and might send to the server
 * depending on the server's capability. Please note that clients might not
 * show semantic tokens or degrade some of the user experience if a range
 * or full request is advertised by the client but not provided by the
 * server. If for example the client capability `requests.full` and
 * `request.range` are both set to true but the server only provides a
 * range provider the client might not render a minimap correctly or might
 * even decide to not show any semantic tokens at all.
 */
class Requests extends DTO
{
    /**
     * The client will send the `textDocument/semanticTokens/range` request
     * if the server provides a corresponding handler.
     *
     * https://microsoft.github.io/language-server-protocol/specifications/specification-3-17/#codeLensClientCapabilities
     * bool|Object TODO cast DTO union-types
     */
    public ?bool $range = null;

    /**
     * The client will send the `textDocument/semanticTokens/full` request
     * if the server provides a corresponding handler.
     *
     * https://microsoft.github.io/language-server-protocol/specifications/specification-3-17/#codeLensClientCapabilities
     * bool|Object(?delta) TODO cast DTO union-types
     */
    public ?bool $full = null;
}
