<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Matching options for the file operation pattern.
 *
 * @since 3.16.0
 */
class FileOperationPatternOptions extends DTO
{
    /**
     * The pattern should be matched ignoring casing.
     */
    public ?bool $ignoreCase = null;
}
