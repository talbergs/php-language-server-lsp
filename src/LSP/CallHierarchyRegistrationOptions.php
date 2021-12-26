<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class CallHierarchyRegistrationOptions extends CallHierarchyOptions
{
    use WorkDoneProgressOptions;
    use TextDocumentRegistrationOptions;
    use StaticRegistrationOptions;
}
