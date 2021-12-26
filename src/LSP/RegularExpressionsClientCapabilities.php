<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Client capabilities specific to regular expressions.
 *
 * @since 3.16.0
 */
class RegularExpressionsClientCapabilities extends DTO
{
    /**
     * The engine's name.
     */
    public string $engine;

    /**
     * The engine's version.
     */
    public ?string $version = null;
}
