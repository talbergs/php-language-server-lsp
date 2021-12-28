<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Represents a location inside a resource, such as a line inside a text file.
 */
class Location extends DTO
{
    public string $uri;
	public Range $range;
}
