<?php

declare(strict_types=1);

namespace Talbergs\LSP\CodeActionClientCapabilities\CodeActionLiteralSupport;

use Talbergs\LSP\DTO;

/**
 * The client supports code action literals as a valid
 * response of the `textDocument/codeAction` request.
 *
 * @since 3.8.0
 */
class CodeActionKind extends DTO
{
    /**
     * The code action kind values the client supports. When this
     * property exists the client also guarantees that it will
     * handle values outside its set gracefully and falls back
     * to a default value when unknown.
     *
     * @var \Talbergs\LSP\CodeActionKind[]
     */
    public array $valueSet;
}
