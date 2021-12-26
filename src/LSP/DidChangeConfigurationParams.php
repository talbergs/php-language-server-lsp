<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class DidChangeConfigurationParams extends DTO
{
    /**
	 * The actual changed settings
	 */
	public mixed $settings;
}
