<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class CompletionItemLabelDetails extends DTO
{
    /**
     * An optional string which is rendered less prominently directly after
     * {@link CompletionItem.label label}, without any spacing. Should be
     * used for function signatures or type annotations.
     */
    public ?string $detail = null;

    /**
     * An optional string which is rendered less prominently after
     * {@link CompletionItemLabelDetails.detail}. Should be used for fully qualified
     * names or file path.
     */
    public ?string $description = null;
}
