<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class CodeActionOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
     * CodeActionKinds that this server may return.
     *
     * The list of kinds may be generic, such as `CodeActionKind.Refactor`,
     * or the server may list out every specific kind they provide.
     *
     * @var CodeActionKind[]
     */
    public ?array $codeActionKinds = null;

    /**
     * The server provides support to resolve additional
     * information for a code action.
     *
     * @since 3.16.0
     */
    public ?bool $resolveProvider = null;
}
