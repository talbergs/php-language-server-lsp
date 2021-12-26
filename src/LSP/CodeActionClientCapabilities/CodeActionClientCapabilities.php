<?php

declare(strict_types=1);

namespace Talbergs\LSP\CodeActionClientCapabilities;

use Talbergs\LSP\DTO;
use Talbergs\LSP\CodeActionClientCapabilities\CodeActionLiteralSupport\CodeActionLiteralSupport;

/**
 * Capabilities specific to the `textDocument/codeAction` request.
 */
class CodeActionClientCapabilities extends DTO
{
    /**
     * Whether code action supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * The client supports code action literals as a valid
     * response of the `textDocument/codeAction` request.
     *
     * @since 3.8.0
     */
    public ?CodeActionLiteralSupport $codeActionLiteralSupport = null;

    /**
     * Whether code action supports the `isPreferred` property.
     *
     * @since 3.15.0
     */
    public ?bool $isPreferredSupport = null;

    /**
     * Whether code action supports the `disabled` property.
     *
     * @since 3.16.0
     */
    public ?bool $disabledSupport = null;

    /**
     * Whether code action supports the `data` property which is
     * preserved between a `textDocument/codeAction` and a
     * `codeAction/resolve` request.
     *
     * @since 3.16.0
     */
    public ?bool $dataSupport = null;


    /**
     * Whether the client supports resolving additional code action
     * properties via a separate `codeAction/resolve` request.
     *
     * @since 3.16.0
     */
    public ?ResolveSupport $resolveSupport = null;

    /**
     * Whether the client honors the change annotations in
     * text edits and resource operations returned via the
     * `CodeAction#edit` property by for example presenting
     * the workspace edit in the user interface and asking
     * for confirmation.
     *
     * @since 3.16.0
     */
    public ?bool $honorsChangeAnnotations = null;
}
