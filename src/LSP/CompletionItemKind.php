<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * The kind of a completion entry.
 */
enum CompletionItemKind: int
{
    case TEXT = 1;
    case METHOD = 2;
    case FUNCTION = 3;
    case CONSTRUCTOR = 4;
    case FIELD = 5;
    case VARIABLE = 6;
    case CCLASS = 7; // "class" is reserved by php
    case INTERFACE = 8;
    case MODULE = 9;
    case PROPERTY = 10;
    case UNIT = 11;
    case VALUE = 12;
    case ENUM = 13;
    case KEYWORD = 14;
    case SNIPPET = 15;
    case COLOR = 16;
    case FILE = 17;
    case REFERENCE = 18;
    case FOLDER = 19;
    case ENUM_MEMBER = 20;
    case CONSTANT = 21;
    case STRUCT = 22;
    case EVENT = 23;
    case OPERATOR = 24;
    case TYPE_PARAMETER = 25;
}
