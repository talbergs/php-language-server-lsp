<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class DocumentOnTypeFormattingOptions extends DTO
{
    /**
	 * A character on which formatting should be triggered, like `}`.
	 */
	public string $firstTriggerCharacter;

	/**
	 * More trigger characters.
     *
     * @var string[]
	 */
	public ?array $moreTriggerCharacter = null;
}
