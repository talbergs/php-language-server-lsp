<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class SignatureHelpOptions extends DTO
{
    use WorkDoneProgressOptions;

    /**
     * The characters that trigger signature help
     * automatically.
     *
     * @var string[]
     */
    public ?array $triggerCharacters = null;

    /**
     * List of characters that re-trigger signature help.
     *
     * These trigger characters are only active when signature help is already
     * showing. All trigger characters are also counted as re-trigger
     * characters.
     *
     * @since 3.15.0
     *
     * @var string[]
     */
    public ?array $retriggerCharacters = null;
}
