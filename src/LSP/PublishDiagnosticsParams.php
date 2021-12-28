<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class PublishDiagnosticsParams extends DTO
{
    /**
     * The URI for which diagnostic information is reported.
     */
    public string $uri;

    /**
     * Optional the version number of the document the diagnostics are published
     * for.
     *
     * @since 3.15.0
     */
    public ?int $version = null;

    /**
     * An array of diagnostic information items.
     *
     * @var Diagnostic[]
     */
    public array $diagnostics;
}
