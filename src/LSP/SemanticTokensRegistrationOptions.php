<?php

declare(strict_types=1);

namespace Talbergs\LSP;

use Talbergs\LSP\SemanticTokensOptions\SemanticTokensOptions;

class SemanticTokensRegistrationOptions extends SemanticTokensOptions
{
    use WorkDoneProgressOptions;
    use TextDocumentRegistrationOptions;
    use StaticRegistrationOptions;
}
