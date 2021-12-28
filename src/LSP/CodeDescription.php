<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Structure to capture a description for an error code.
 *
 * @since 3.16.0
 */
class CodeDescription extends DTO
{
    /**
	 * An URI to open with more information about the diagnostic error.
	 */
	public string $href;
}

