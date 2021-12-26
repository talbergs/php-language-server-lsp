<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class LinkedEditingRangeRegistrationOptions extends LinkedEditingRangeOptions
{
    use WorkDoneProgressOptions;
    use TextDocumentRegistrationOptions;
    use StaticRegistrationOptions;
}
