<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Client supports the default behavior result
 * (`{ defaultBehavior: boolean }`).
 *
 * The value indicates the default behavior used by the
 * client.
 *
 * @since version 3.16.0
 */
enum PrepareSupportDefaultBehavior: int
{
    /**
     * The client's default behavior is to select the identifier
     * according the to language's syntax rule.
     */
    case IDENTIFIER = 1;
}
