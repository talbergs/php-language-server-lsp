<?php

declare(strict_types=1);

namespace Talbergs\LSP\PublishDiagnosticsClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Client supports the tag property to provide meta data about a diagnostic.
 * Clients supporting tags have to handle unknown tags gracefully.
 *
 * @since 3.15.0
 */
class TagSupport extends DTO
{
    /**
     * The tags supported by the client.
     *
     * @var \Talbergs\LSP\DiagnosticTag[];
     */
    public array $valueSet;
}
