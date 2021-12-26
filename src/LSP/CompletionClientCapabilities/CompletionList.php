<?php

declare(strict_types=1);

namespace Talbergs\LSP\CompletionClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * The client supports the following `CompletionList` specific
 * capabilities.
 *
 * @since 3.17.0 - proposed state
 */
class CompletionList extends DTO
{
    /**
     * The client supports the the following itemDefaults on
     * a completion list.
     *
     * The value lists the supported property names of the
     * `CompletionList.itemDefaults` object. If omitted
     * no properties are supported.
     *
     * @since 3.17.0 - proposed state
     *
     * @var string[]
     */
    public ?array $itemDefaults = null;
}
