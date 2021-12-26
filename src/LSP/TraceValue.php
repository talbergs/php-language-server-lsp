<?php

declare(strict_types=1);

namespace Talbergs\LSP;

enum TraceValue: string
{
    case OFF = 'off';
    case MESSAGES = 'messages';
    case VERBOSE = 'verbose';
}
