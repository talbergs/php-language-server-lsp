<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Client capabilities for the show document request.
 *
 * @since 3.16.0
 */
class ShowDocumentClientCapabilities extends DTO
{
    /**
     * The client has support for the show document
     * request.
     */
    public bool $support;
}
