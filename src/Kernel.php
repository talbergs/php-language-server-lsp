<?php

declare(strict_types=1);

namespace Talbergs;

use Talbergs\Transports\HTTP;
use Talbergs\Transports\LSP;
use Talbergs\Transports\JsonRpc;
use React\Stream\ReadableResourceStream;
use React\Stream\WritableResourceStream;
use React\Stream\ThroughStream;
use \React\EventLoop\Loop;
use Talbergs\LSP\DidChangeConfigurationParams;
use Talbergs\LSP\DidChangeTextDocumentParams;
use Talbergs\LSP\DidOpenTextDocumentParams;
use Talbergs\LSP\DTO;
use Talbergs\LSP\Hover;
use Talbergs\LSP\HoverParams;
use Talbergs\LSP\InitializedParams;
use Talbergs\LSP\InitializeParams;
use Talbergs\LSP\InitializeResult\InitializeResult;
use Talbergs\LSP\PublishDiagnosticsParams;

final class Kernel
{
    static WritableResourceStream $channel;

    public static function listen()
    {
        $loop = Loop::get();

        $stdin = new ReadableResourceStream(STDIN, $loop);
        $stdout = new WritableResourceStream(STDOUT, $loop);

        self::$channel = $stdout;
        $stdin->on('data', fn (string $data) => self::handleInput($data));

        $loop->addPeriodicTimer(1, function(){});
        $loop->run();
    }

    private static function handleInput(string $data)
    {
        $data = HTTP::recv($data);
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

    public static function handleShutdownRequest(int $id)
    {}

    public static function handleTextDocumentDidOpenNotification(DidOpenTextDocumentParams $params)
    {}

    public static function handleDidChangeConfigurationNotification(DidChangeConfigurationParams $params)
    {}

    public static function handleTextDocumentDidChangeNotification(DidChangeTextDocumentParams $params)
    {
        // Send a notification.
        $json = '{"uri":"file:///home/ada/Projects/php-language-server-lsp/php-test-file.sense","diagnostics":[{"range":{"start":{"line":2,"character":0},"end":{"line":2,"character":2}},"message":"Undefined function \'bs\'.","severity":1,"code":1010,"source":"intelephense"}]}';
        // {\"jsonrpc\":\"2.0\",\"method\":\"textDocument/publishDiagnostics\",\"params\":{\"uri\":\"file:///home/ada/Projects/php-language-server-lsp/php-test-file.php\",\"diagnostics\":[{\"range\":{\"start\":{\"line\":2,\"character\":0},\"end\":{\"line\":2,\"character\":2}},\"message\":\"Undefined function 'bs'.\",\"severity\":1,\"code\":1010,\"source\":\"intelephense\"}]}}
        self::notifyTextDocumentPublishDiagnostics(PublishDiagnosticsParams::fromJson($json));
    }

    public static function handleInitializedNotification(InitializedParams $params)
    {
    }

    public static function respond(int $id, DTO $result): void
    {
        self::$channel->write(
            HTTP::send(
                JsonRpc::respond($id, $result->toArr()),
            ),
        );
    }

    public static function notifyTextDocumentPublishDiagnostics(PublishDiagnosticsParams $params)
    {
        self::$channel->write(
            HTTP::send(
                JsonRpc::notify('textDocument/publishDiagnostics', $params->toArr()),
            ),
        );
    }

    public static function handleHoverRequest(int $id, HoverParams $request)
    {
        $json = '{"contents":{"kind":"markdown","value":"**babaaaah!**\\nyee"},"range":{"start":{"line":4,"character":0},"end":{"line":4,"character":7}}}';
        $res = Hover::fromJson($json);

        self::respond($id, $res);
    }

    public static function handleInitializeRequest(int $id, InitializeParams $request)
    {
        $res = InitializeResult::fromJson('{"capabilities":{"textDocumentSync":2,"documentSymbolProvider":true,"workspaceSymbolProvider":true,"completionProvider":{"triggerCharacters":["$",">",":","\\\\","/","*",".","<"],"resolveProvider":true},"signatureHelpProvider":{"triggerCharacters":["(",",",":"]},"definitionProvider":true,"documentFormattingProvider":true,"documentRangeFormattingProvider":true,"referencesProvider":true,"hoverProvider":true,"documentHighlightProvider":true,"foldingRangeProvider":true,"implementationProvider":true,"declarationProvider":true,"workspace":{"workspaceFolders":{"supported":true,"changeNotifications":true}},"renameProvider":{"prepareProvider":true},"typeDefinitionProvider":true,"selectionRangeProvider":true,"codeActionProvider":true,"executeCommandProvider":{"commands":["intelephense.import.symbol","intelephense.implement.abstract.method.all","intelephense.phpdoc.add"]}}}');
        self::respond($id, $res);
    }
}
