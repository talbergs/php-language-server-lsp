<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class WorkspaceFolder extends DTO
{
    /**
     * The associated URI for this workspace folder.
     */
    public string $uri;

    /**
     * The name of the workspace folder. Used to refer to this
     * workspace folder in the user interface.
     */
    public string $name;
}
