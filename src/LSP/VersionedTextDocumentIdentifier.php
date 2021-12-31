<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class VersionedTextDocumentIdentifier extends TextDocumentIdentifier
{
    /**
	 * The version number of this document.
	 *
	 * The version number of a document will increase after each change,
	 * including undo/redo. The number doesn't need to be consecutive.
	 */
	public int $version;
}
