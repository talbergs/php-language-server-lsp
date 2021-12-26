<?php

declare(strict_types=1);

namespace Talbergs\LSP;

class FoldingRangeRegistrationOptions extends FoldingRangeOptions
{
    use WorkDoneProgressOptions;
    use TextDocumentRegistrationOptions;
    use StaticRegistrationOptions;
}
