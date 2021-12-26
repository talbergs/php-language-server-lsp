<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/rename` request.
 */
class RenameClientCapabilities extends DTO
{
    /**
     * Whether rename supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * Client supports testing for validity of rename operations
     * before execution.
     *
     * @since version 3.12.0
     */
    public ?bool $prepareSupport = null;

    /**
     * Client supports the default behavior result
     * (`{ defaultBehavior: boolean }`).
     *
     * The value indicates the default behavior used by the
     * client.
     *
     * @since version 3.16.0
     */
    public ?PrepareSupportDefaultBehavior $prepareSupportDefaultBehavior = null;

    /**
     * Whether th client honors the change annotations in
     * text edits and resource operations returned via the
     * rename request's workspace edit by for example presenting
     * the workspace edit in the user interface and asking
     * for confirmation.
     *
     * @since 3.16.0
     */
    public ?bool $honorsChangeAnnotations = null;
}
