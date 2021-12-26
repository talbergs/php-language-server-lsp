<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class TypeDefinitionRegistrationOptions extends TypeDefinitionOptions
{
    use WorkDoneProgressOptions;
    use TextDocumentRegistrationOptions;
    use StaticRegistrationOptions;
}
