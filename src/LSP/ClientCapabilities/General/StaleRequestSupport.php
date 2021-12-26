<?php

declare(strict_types=1);

namespace Talbergs\LSP\ClientCapabilities\General;

use Talbergs\LSP\DTO;

/**
 * Client capability that signals how the client
 * handles stale requests (e.g. a request
 * for which the client will not process the response
 * anymore since the information is outdated).
 *
 * @since 3.17.0
 */
class StaleRequestSupport extends DTO
{
    /**
     * The client will actively cancel the request.
     */
    public bool $cancel;

    /**
     * The list of requests for which the client
     * will retry the request if it receives a
     * response with error code `ContentModified``
     *
     * @var string[]
     */
    public array $retryOnContentModified;
}
