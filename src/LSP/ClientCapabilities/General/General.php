<?php

declare(strict_types=1);

namespace Talbergs\LSP\ClientCapabilities\General;

use Talbergs\LSP\DTO;
use Talbergs\LSP\RegularExpressionsClientCapabilities;
use Talbergs\LSP\MarkdownClientCapabilities;

class General extends DTO
{
    /**
     * Client capability that signals how the client
     * handles stale requests (e.g. a request
     * for which the client will not process the response
     * anymore since the information is outdated).
     *
     * @since 3.17.0
     */
    public ?StaleRequestSupport $staleRequestSupport = null;

    /**
     * Client capabilities specific to regular expressions.
     *
     * @since 3.16.0
     */
    public ?RegularExpressionsClientCapabilities $regularExpressions = null;

    /**
     * Client capabilities specific to the client's markdown parser.
     *
     * @since 3.16.0
     */
    public ?MarkdownClientCapabilities $markdown = null;
}
