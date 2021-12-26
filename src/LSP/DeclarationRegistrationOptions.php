<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class DeclarationRegistrationOptions extends DeclarationOptions
{
    use WorkDoneProgressOptions;
    use TextDocumentRegistrationOptions;
    use StaticRegistrationOptions;
}
