<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * A filter to describe in which file operation requests or notifications
 * the server is interested in.
 *
 * @since 3.16.0
 */
class FileOperationFilter extends DTO
{
    /**
	 * A Uri like `file` or `untitled`.
	 */
	public ?string $scheme = null;

	/**
	 * The actual file operation pattern.
	 */
	public FileOperationPattern $pattern;
}
