<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * A symbol kind.
 */
enum SymbolKind: int
{
    case FILE = 1;
    case MODULE = 2;
    case NAMESPACE = 3;
    case PACKAGE = 4;
    case CCLASS = 5; // "class" is reserved by php
    case METHOD = 6;
    case PROPERTY = 7;
    case FIELD = 8;
    case CONSTRUCTOR = 9;
    case ENUM = 10;
    case INTERFACE = 11;
    case FUNCTION = 12;
    case VARIABLE = 13;
    case CONSTANT = 14;
    case STRING = 15;
    case NUMBER = 16;
    case BOOLEAN = 17;
    case ARRAY = 18;
    case OBJECT = 19;
    case KEY = 20;
    case NULL = 21;
    case ENUMMEMBER = 22;
    case STRUCT = 23;
    case EVENT = 24;
    case OPERATOR = 25;
    case TYPEPARAMETER = 26;
}
