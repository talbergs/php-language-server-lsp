<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class ExecuteCommandOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
	 * The commands to be executed on the server
     *
     * @var string[]
	 */
	public array $commands;
}
