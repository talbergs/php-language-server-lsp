<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * A pattern to describe in which file operation requests or notifications
 * the server is interested in.
 *
 * @since 3.16.0
 */
class FileOperationPattern extends DTO
{
    /**
     * The glob pattern to match. Glob patterns can have the following syntax:
     * - `*` to match one or more characters in a path segment
     * - `?` to match on one character in a path segment
     * - `**` to match any number of path segments, including none
     * - `{}` to group sub patterns into an OR expression. (e.g. `**​/*.{ts,js}`
     *   matches all TypeScript and JavaScript files)
     * - `[]` to declare a range of characters to match in a path segment
     *   (e.g., `example.[0-9]` to match on `example.0`, `example.1`, …)
     * - `[!...]` to negate a range of characters to match in a path segment
     *   (e.g., `example.[!0-9]` to match on `example.a`, `example.b`, but
     *   not `example.0`)
     */
    public string $glob;

    /**
     * Whether to match files or folders with this pattern.
     *
     * Matches both if undefined.
     */
    public ?FileOperationPatternKind $matches = null;

    /**
     * Additional options used during matching.
     */
    public ?FileOperationPatternOptions $options = null;
}
