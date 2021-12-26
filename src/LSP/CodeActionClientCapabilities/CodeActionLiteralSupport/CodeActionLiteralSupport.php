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
class CodeActionLiteralSupport extends DTO
{
    /**
     * The code action kind is supported with the following value
     * set.
     */
    public CodeActionKind $codeActionKind;
}
