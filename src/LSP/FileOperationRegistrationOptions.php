<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * The options to register for file operations.
 *
 * @since 3.16.0
 */
class FileOperationRegistrationOptions extends DTO
{
    /**
	 * The actual filters.
     *
     * @var \Talbergs\LSP\FileOperationFilter[]
     */
    public array $filters;
}
