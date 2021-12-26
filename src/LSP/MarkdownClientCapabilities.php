<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Client capabilities specific to the client's markdown parser.
 *
 * @since 3.16.0
 */
class MarkdownClientCapabilities extends DTO
{
    /**
     * The name of the parser.
     */
    public string $parser;

    /**
     * The version of the parser.
     */
    public ?string $version = null;

    /**
     * A list of HTML tags that the client allows / supports in
     * Markdown.
     *
     * @since 3.17.0
     *
     * @var string[]
     */
    public ?array $allowedTags = null;
}
