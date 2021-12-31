<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class Command extends DTO
{
    /**
     * Title of the command, like `save`.
     */
    public string $title;

    /**
     * The identifier of the actual command handler.
     */
    public string $command;

    /**
     * Arguments that the command handler should be
     * invoked with.
     *
     * @var mixed[]
     */
    public array $arguments = null;
}
