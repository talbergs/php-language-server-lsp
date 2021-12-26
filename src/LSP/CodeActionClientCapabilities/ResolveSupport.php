<?php

declare(strict_types=1);

namespace Talbergs\LSP\CodeActionClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Whether the client supports resolving additional code action
 * properties via a separate `codeAction/resolve` request.
 *
 * @since 3.16.0
 */
class ResolveSupport extends DTO
{
    /**
     * The properties that a client can resolve lazily.
     *
     * @var string[]
     */
    public array $properties;
}
