<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Represents a collection of [completion items](#CompletionItem) to be
 * presented in the editor.
 */
class CompletionList extends DTO
{
    /**
     * This list is not complete. Further typing should result in recomputing
     * this list.
     *
     * Recomputed lists have all their items replaced (not appended) in the
     * incomplete completion sessions.
     */
    public bool $isIncomplete;

    /**
     * The completion items.
     *
     * @var CompletionItem[]
     */
    public array $items;
}
