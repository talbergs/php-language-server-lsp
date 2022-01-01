<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class ConfigurationItem extends DTO
{
    /**
     * The scope to get the configuration section for.
     */
    public ?string $scopeUri = null;

    /**
     * The configuration section asked for.
     */
    public ?string $section = null;
}
