<?php

declare(strict_types=1);

namespace Talbergs\LSP\WorkspaceEditClientCapabilities;

use Talbergs\LSP\DTO;

/**
 * Whether the client in general supports change annotations on text edits,
 * create file, rename file and delete file changes.
 *
 * @since 3.16.0
 */
class ChangeAnnotationSupport extends DTO
{
    /**
     * Whether the client groups edits with equal labels into tree nodes,
     * for instance all edits labelled with "Changes in Strings" would
     * be a tree node.
     */
    public ?bool $groupsOnLabel = null;
}
