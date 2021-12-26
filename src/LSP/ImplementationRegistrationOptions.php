<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class ImplementationRegistrationOptions extends ImplementationOptions
{
    use WorkDoneProgressOptions;
    use TextDocumentRegistrationOptions;
    use StaticRegistrationOptions;
}
