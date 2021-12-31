<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Contains additional information about the context in which a completion
 * request is triggered.
 */
class CompletionContext extends DTO
{
    /**
     * How the completion was triggered.
     */
    public CompletionTriggerKind $triggerKind;

    /**
     * The trigger character (a single character) that has trigger code
     * complete. Is undefined if
     * `triggerKind !== CompletionTriggerKind.TriggerCharacter`
     */
    public ?string $triggerCharacter = null;
}
