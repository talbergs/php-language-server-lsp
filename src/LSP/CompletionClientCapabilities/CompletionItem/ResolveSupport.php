<?php

declare(strict_types=1);

namespace Talbergs\LSP\CompletionClientCapabilities\CompletionItem;

use Talbergs\LSP\DTO;

/**
 * Indicates which properties a client can resolve lazily on a
 * completion item. Before version 3.16.0 only the predefined properties
 * `documentation` and `detail` could be resolved lazily.
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
