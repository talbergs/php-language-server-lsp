<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * The client supports the `insertTextMode` property on
 * a completion item to override the whitespace handling mode
 * as defined by the client (see `insertTextMode`).
 *
 * @since 3.16.0
 */
class TextDocumentClientCapabilitiesCompletionItemInsertTextModeSupport extends DTO
{
    /**
     * The client supports the `insertTextMode` property on
     * a completion item to override the whitespace handling mode
     * as defined by the client (see `insertTextMode`).
     *
     * @since 3.16.0
     *
     * @var InsertTextMode[]
     */
    public array $valueSet;
}
