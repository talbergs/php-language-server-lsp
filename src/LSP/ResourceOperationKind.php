<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * The kind of resource operations supported by the client.
 */
enum ResourceOperationKind: string
{
    /**
     * Supports creating new files and folders.
     */
    case CREATE = 'create';

    /**
     * Supports renaming existing files and folders.
     */
    case RENAME = 'rename';

    /**
     * Supports deleting existing files and folders.
     */
    case DELETE = 'delete';
}
