<?php

declare(strict_types=1);

namespace Talbergs\LSP\WorkspaceEditClientCapabilities;

use Talbergs\LSP\DTO;
use Talbergs\LSP\FailureHandlingKind;

/**
 * Capabilities specific to `WorkspaceEdit`s
 */
class WorkspaceEditClientCapabilities extends DTO
{
    /**
     * The client supports versioned document changes in `WorkspaceEdit`s
     */
    public ?bool $documentChanges = null;

    /**
     * The resource operations the client supports. Clients should at least
     * support 'create', 'rename' and 'delete' files and folders.
     *
     * @since 3.13.0
     *
     * @var \Talbergs\LSP\ResourceOperationKind[]
     */
    public ?array $resourceOperations = null;

    /**
     * The failure handling strategy of a client if applying the workspace edit
     * fails.
     *
     * @since 3.13.0
     */
    public ?FailureHandlingKind $failureHandling = null;

    /**
     * Whether the client normalizes line endings to the client specific
     * setting.
     * If set to `true` the client will normalize line ending characters
     * in a workspace edit to the client specific new line character(s).
     *
     * @since 3.16.0
     */
    public ?bool $normalizesLineEndings = null;

    /**
     * Whether the client in general supports change annotations on text edits,
     * create file, rename file and delete file changes.
     *
     * @since 3.16.0
     */
    public ?ChangeAnnotationSupport $changeAnnotationSupport = null;
}
