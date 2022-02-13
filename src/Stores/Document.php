<?php

declare(strict_types=1);

namespace Talbergs\Stores;

use Talbergs\LSP\DidChangeTextDocumentParams;
use Talbergs\LSP\TextDocumentItem;
use TS\Tree;
use \Talbergs\LSP\TextDocumentContentChangeEvent;

class Document
{
    private ?Tree $tree = null;
    private string $code = '';

    /**
     * A list where indice corresponds to a line number in text document buffer and value represents total byte offset
     * where the given line begins. Lines are 0-indexed and byte offset is not equal to character offset (utf-8).
     */
    private array $charOffsets = [];

    /**
     * @var static[]
     */
    private static array $store = [];

    public static function open(TextDocumentItem $document): void
    {
        $doc = new static();

        $doc->code = $document->text;
        $doc->charOffsets = static::createOffsets($doc->code);
        $doc->tree = Parser::parse(null, $doc->code);

        static::$store[$document->uri] = $doc;
        define('A',1);
    }

    public static function update(DidChangeTextDocumentParams $update): void
    {
        foreach ($update->contentChanges as $changeEvent) {
            $doc = static::$store[$update->textDocument->uri];
            $doc->code = static::changeCode($changeEvent, $doc->code, $doc->charOffsets);
            $doc->tree = Parser::parse($doc->tree, $doc->code);
            $doc->charOffsets = static::createOffsets($doc->code);
        }
    }

    private static function createOffsets(string $code): array
    {
        $charOffsets = [];
        $size = 0;
        foreach (explode(PHP_EOL, $code) as $line) {
            $charOffsets[] = $size;
            $size = $size + 1 + strlen($line);
        }

        return $charOffsets;
    }

    private static function changeCode(TextDocumentContentChangeEvent $changeEvent, string $code, array $offsets): string
    {
        if ($changeEvent->range === null) {
            return $changeEvent->text;
        }

        // TODO: multibyte
        // TODO: update offsets index
        $startByte = $offsets[$changeEvent->range->start->line] + $changeEvent->range->start->character;
        $endByte = $offsets[$changeEvent->range->end->line] + $changeEvent->range->end->character;

        return substr_replace($code, $changeEvent->text, $startByte, $endByte - $startByte);
    }
}
