<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Represents a related message and source code location for a diagnostic.
 * This should be used to point to code locations that cause or are related to
 * a diagnostics, e.g when duplicating a symbol in a scope.
 */
class DiagnosticRelatedInformation extends DTO
{
    /**
     * The location of this related diagnostic information.
     */
    public Location $location;

    /**
     * The message of this related diagnostic information.
     */
    public string $message;
}

