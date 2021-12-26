<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class TextDocumentSyncOptions extends DTO
{
    /**
     * Open and close notifications are sent to the server. If omitted open
     * close notification should not be sent.
     */
    public ?bool $openClose = null;

    /**
     * Change notifications are sent to the server. See
     * TextDocumentSyncKind.None, TextDocumentSyncKind.Full and
     * TextDocumentSyncKind.Incremental. If omitted it defaults to
     * TextDocumentSyncKind.None.
     */
    public ?TextDocumentSyncKind $change = null;
}
