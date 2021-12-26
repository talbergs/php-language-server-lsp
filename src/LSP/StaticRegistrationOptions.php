<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Static registration options to be returned in the initialize request.
 */
trait StaticRegistrationOptions
{
    /**
     * The id used to register the request. The id can be used to deregister
     * the request again. See also Registration#id.
     */
    public ?string $id = null;
}
