<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * General text document registration options.
 */
trait TextDocumentRegistrationOptions
{
    /**
	 * A document selector to identify the scope of the registration. If set to
	 * null the document selector provided on the client side will be used.
     *
     * @var DocumentFilter[]
	 */
	public ?array $documentSelector = null;
}
