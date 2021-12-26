<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Capabilities specific to the `textDocument/hover` request.
 */
class HoverClientCapabilities extends DTO
{
    /**
     * Whether hover supports dynamic registration.
     */
    public ?bool $dynamicRegistration = null;

    /**
     * Client supports the follow content formats if the content
     * property refers to a `literal of type MarkupContent`.
     * The order describes the preferred format of the client.
     *
     * @var MarkupKind[]
     */
    public ?array $contentFormat = null;
}
