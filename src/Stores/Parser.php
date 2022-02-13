<?php

declare(strict_types=1);

namespace Talbergs\Stores;

use TS\Tree;
use \TS\Parser as TsParser;

class Parser 
{
    private static function parser(): TsParser
    {
        static $parser;

        if (!$parser) {
            $parser = \TS\Parser::new();
            $parser->setLanguage(\TS\Language\php());
        }

        return $parser;
    }

    public static function parse(?Tree $oldTree, string $code): Tree
    {
        return self::parser()->parseString($oldTree, $code);
    }
}
