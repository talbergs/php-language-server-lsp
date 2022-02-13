<?php

declare(strict_types=1);

namespace Talbergs;

use Talbergs\Transports\HTTP;
use Talbergs\Transports\JsonRpc;
use React\Stream\ReadableResourceStream;
use React\Stream\WritableResourceStream;
use \React\EventLoop\Loop;
use Talbergs\LSP\CompletionList;
use Talbergs\LSP\CompletionOptions\CompletionOptions;
use Talbergs\LSP\CompletionParams;
use Talbergs\LSP\DidChangeConfigurationParams;
use Talbergs\LSP\DidChangeTextDocumentParams;
use Talbergs\LSP\DidOpenTextDocumentParams;
use Talbergs\LSP\DTO;
use Talbergs\LSP\Hover;
use Talbergs\LSP\HoverParams;
use Talbergs\LSP\InitializedParams;
use Talbergs\LSP\InitializeParams;
use Talbergs\LSP\InitializeResult\InitializeResult;
use Talbergs\LSP\MarkupContent;
use Talbergs\LSP\MarkupKind;
use Talbergs\LSP\PublishDiagnosticsParams;
use Talbergs\LSP\ServerCapabilities\ServerCapabilities;
use Talbergs\LSP\TextDocumentSyncKind;
use Talbergs\LSP\TextDocumentSyncOptions;
use Talbergs\LSP\WorkspaceFolder;
use Talbergs\Stores\Document;

final class Kernel
{
    static WritableResourceStream $channel;

    public static function listen()
    {
        l(__METHOD__);
        $loop = Loop::get();

        $stdin = new ReadableResourceStream(STDIN, $loop);
        $stdout = new WritableResourceStream(STDOUT, $loop);

        self::$channel = $stdout;
        $stdin->on('data', fn (string $data) => self::handleInput($data));

        $loop->addPeriodicTimer(1, function(){});
        $loop->run();
    }

    private static function handleInput(string $streamData)
    {
        if (defined('A')) {
            sleep(1);
        l($streamData);
        return;
        }
        l(__METHOD__);

        foreach (HTTP::recv($streamData) as $data) {
            $data = JsonRpc::recv($data);

            [
                'method' => $method,
                'params' => $params,
                'id' => $id,
            ] = $data + [
                'method' => '',
                'params' => null,
                'id' => null,
            ];

            if ($id !== null) {
                match ($method) {
                'initialize' => self::handleInitializeRequest($data['id'], InitializeParams::fromArr($params)),
                    'shutdown' => self::handleShutdownRequest($data['id']),
                    'textDocument/hover' => self::handleHoverRequest($data['id'], HoverParams::fromArr($params)),
                    'textDocument/completion'  => self::handleCompletionRequest($data['id'], CompletionParams::fromArr($params)),
            };
            } else {
                match ($method) {
                'initialized' =>  self::handleInitializedNotification(InitializedParams::fromArr($params)),
                    'workspace/didChangeConfiguration' => self::handleDidChangeConfigurationNotification(DidChangeConfigurationParams::fromArr($params)),
                    'textDocument/didOpen' => self::handleTextDocumentDidOpenNotification(DidOpenTextDocumentParams::fromArr($params)),
                    'textDocument/didChange' => self::handleTextDocumentDidChangeNotification(DidChangeTextDocumentParams::fromArr($params)),
            };
            }
        }
    }

    public static function handleCompletionRequest(int $id, CompletionParams $params)
    {
        l(__METHOD__);

        $json = '{"isIncomplete":false,"items":[{"label":"public","kind":14,"textEdit":{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":5}},"newText":"public"},"sortText":"public"},{"label":"private","kind":14,"textEdit":{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":5}},"newText":"private"},"sortText":"private"},{"label":"protected","kind":14,"textEdit":{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":5}},"newText":"protected"},"sortText":"protected"}]}';
        $res = CompletionList::fromJson($json);

        self::respond($id, $res);
    }

    public static function handleShutdownRequest(int $id)
    {
        l(__METHOD__);
    }

    public static function handleTextDocumentDidOpenNotification(DidOpenTextDocumentParams $params)
    {
        Document::open($params->textDocument);
    }

    public static function handleDidChangeConfigurationNotification(DidChangeConfigurationParams $params)
    {
        l(__METHOD__);
    }

    public static function handleTextDocumentDidChangeNotification(DidChangeTextDocumentParams $params)
    {
        Document::update($params);
        // l($params);
        // l(__METHOD__);
        // Send a notification.
        // $json = '{"uri":"file:///home/ada/Projects/php-language-server-lsp/php-test-file.sense","diagnostics":[{"range":{"start":{"line":2,"character":0},"end":{"line":2,"character":2}},"message":"Undefined function \'bs\'.","severity":1,"code":1010,"source":"intelephense"}]}';
        // {\"jsonrpc\":\"2.0\",\"method\":\"textDocument/publishDiagnostics\",\"params\":{\"uri\":\"file:///home/ada/Projects/php-language-server-lsp/php-test-file.php\",\"diagnostics\":[{\"range\":{\"start\":{\"line\":2,\"character\":0},\"end\":{\"line\":2,\"character\":2}},\"message\":\"Undefined function 'bs'.\",\"severity\":1,\"code\":1010,\"source\":\"intelephense\"}]}}
        // self::notifyTextDocumentPublishDiagnostics(PublishDiagnosticsParams::fromJson($json));
    }

    public static function handleInitializedNotification(InitializedParams $params)
    {
        l(__METHOD__);
    }

    public static function respond(int $id, DTO $result): void
    {
        l(__METHOD__);
        self::$channel->write(
            HTTP::send(
                JsonRpc::respond($id, $result->toArr()),
            ),
        );
    }

    public static function notifyTextDocumentPublishDiagnostics(PublishDiagnosticsParams $params)
    {
        l(__METHOD__);
        self::$channel->write(
            HTTP::send(
                JsonRpc::notify('textDocument/publishDiagnostics', $params->toArr()),
            ),
        );
    }

    public static function parse(string $code): \TS\Tree
    {
        $parser = \TS\Parser::new();
        $parser->setLanguage(\TS\Language\php());
        return $parser->parseString(null, $code);
    }

    public static function handleHoverRequest(int $id, HoverParams $params)
    {
        $code = file_get_contents($params->textDocument->uri);
        $tree = self::parse($code);
        $p1 = new \TS\Point($params->position->line, $params->position->character);

        $node = $tree->getRootNode()->getNamedDescendantForPointRange($p1, $p1);
        l($node);

$doc = 'no';
        // Looking for function calls to doc.
        if ($node->getParent()->getParent()->getType() === 'function_call_expression') {
            $functionName = $node->text($code);
            $doc = match ($functionName) {
                'abs' => 'abs functon yeey',
                'min' => 'min functon yass,',
                default => 'no documentation was found',
            };
        }

        $hover = new Hover();
        $contents = new MarkupContent();
        $contents->kind = MarkupKind::PLAIN_TEXT;
        $contents->value = $doc;
        $hover->contents = $contents;

        // l(__METHOD__);
        // $json = '{"contents":{"kind":"markdown","value":"**babaaaah!**\\nyee"},"range":{"start":{"line":4,"character":0},"end":{"line":4,"character":7}}}';
        // $res = Hover::fromJson($json);

        self::respond($id, $hover);
    }

    public static function handleInitializeRequest(int $id, InitializeParams $request)
    {
        l(__METHOD__);
        $capabilities = new ServerCapabilities();
        if ($synchronization = $request->capabilities->textDocument?->synchronization) {
        }
        if ($hover = $request->capabilities->textDocument?->hover) {
            $capabilities->hoverProvider = true;
            // register hover service responder. And also the callback?
        }

        if ($completion = $request->capabilities->textDocument?->completion) {
            // $capabilities->completionProvider = new CompletionOptions();
        }

        $capabilities->textDocumentSync = new TextDocumentSyncOptions();
        $capabilities->textDocumentSync->change = TextDocumentSyncKind::INCREMENTAL;
        // $capabilities->textDocumentSync->change = TextDocumentSyncKind::FULL;
        $capabilities->textDocumentSync->openClose = true;

        foreach ($request->workspaceFolders as $workspaceFolder) {
            self::newWorkspace($workspaceFolder);
        }

        // $res = InitializeResult::fromJson('{"capabilities":{"textDocumentSync":2,"documentSymbolProvider":true,"workspaceSymbolProvider":true,"completionProvider":{"triggerCharacters":["$",">",":","\\\\","/","*",".","<"],"resolveProvider":true},"signatureHelpProvider":{"triggerCharacters":["(",",",":"]},"definitionProvider":true,"documentFormattingProvider":true,"documentRangeFormattingProvider":true,"referencesProvider":true,"hoverProvider":true,"documentHighlightProvider":true,"foldingRangeProvider":true,"implementationProvider":true,"declarationProvider":true,"workspace":{"workspaceFolders":{"supported":true,"changeNotifications":true}},"renameProvider":{"prepareProvider":true},"typeDefinitionProvider":true,"selectionRangeProvider":true,"codeActionProvider":true,"executeCommandProvider":{"commands":["intelephense.import.symbol","intelephense.implement.abstract.method.all","intelephense.phpdoc.add"]}}}');
        $res = InitializeResult::fromNamed(capabilities: $capabilities);
        self::respond($id, $res);
    }

    private static function newWorkspace(WorkspaceFolder $workspaceFolder)
    {
        l(scandir($workspaceFolder->uri));
    }
}
