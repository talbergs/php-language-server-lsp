<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class LogMessageParams extends DTO
{
    /**
	 * The message type. See {@link MessageType}
	 */
	public MessageType $type;

	/**
	 * The actual message
	 */
	public string $message;
}
