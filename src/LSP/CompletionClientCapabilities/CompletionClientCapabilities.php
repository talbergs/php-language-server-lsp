<?php

declare(strict_types=1);

namespace Talbergs\LSP\CompletionClientCapabilities;

use Talbergs\LSP\DTO;
use Talbergs\LSP\InsertTextMode;
use Talbergs\LSP\CompletionClientCapabilities\CompletionItem\CompletionItem;

/**
 * Capabilities specific to the `textDocument/completion` request.
 */
class CompletionClientCapabilities extends DTO
{
    /**
     * Whether completion supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * The client supports the following `CompletionItem` specific
     * capabilities.
     */
    public ?CompletionItem $completionItem = null;

    public ?CompletionItemKind $completionItemKind = null;

    /**
     * The client supports to send additional context information for a
     * `textDocument/completion` request.
     */
    public ?bool $contextSupport = null;

    /**
     * The client's default when the completion item doesn't provide a
     * `insertTextMode` property.
     *
     * @since 3.17.0 - proposed state
     */
    public ?InsertTextMode $insertTextMode = null;

    /**
     * The client supports the following `CompletionList` specific
     * capabilities.
     *
     * @since 3.17.0 - proposed state
     */
    public ?CompletionList $completionList = null;
}

