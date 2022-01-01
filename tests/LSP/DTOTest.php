<?php

declare(strict_types=1);

// TODO: Test if traits are acted upon as expected.

// Fixtures in global NS.
namespace {
    use \Talbergs\LSP\DTO;

    class A extends DTO
    {
        public AA $aa;
    }

    class AA extends DTO
    {
        public AAA $aaa;
    }

    class AAA extends DTO
    {
        public ?int $int = null;
    }

    class B extends DTO
    {
        /**
         * @var BB[]
         */
        public array $bbList;
        public BB $bbOne;
        public int $primitive;
    }

    class BB extends DTO
    {
        public int $int;
    }

    class E extends DTO
    {
        public EnumValue $value;
    }

    class EEE extends DTO
    {
        public EnumIntValue $value;
    }

    class E1 extends DTO
    {
        /**
         * @var EnumValue[]
         */
        public array $value;
    }

    class E2 extends DTO
    {
        /**
         * @var EnumIntValue[]
         */
        public array $value;
    }

    class E3 extends DTO
    {
        /**
         * @var string[]
         */
        public array $value;
    }

    enum EnumIntValue: int
    {
        case ONE = 1;
        case TWO = 2;
    }

    enum EnumValue: string
    {
        case ONE = 'one';
        case TWO = 'two';
    }

    class F extends DTO
    {
        /**
         * With doc block.
         */
        public mixed $value1 = null;
        public mixed $value2 = null;
        public mixed $value3 = null;
    }

    class AAAA extends DTO
    {
        public bool $value;
    }

    class Union1 extends DTO
    {
        public int $union1;
    }

    class Union2 extends DTO
    {
        public int $union2;
    }

    class UnionMe extends DTO
    {
        public Union1|Union2 $value;
    }
}

// Fixtures in NS 1.
namespace n\ns1 {
    use \Talbergs\LSP\DTO;

    class N extends DTO
    {
        /**
         * DTO will construct \n\ns1\NN object. (defaulting to current NS).
         *
         * @var NN[]
         */
        public array $nn1;

        /**
         * DTO will construct \n\ns2\NN object.
         *
         * @var \n\ns2\NN[]
         */
        public array $nn2;
    }

    class NN extends DTO
    {
        public int $int;
    }
}

// Fixtures in NS 2.
namespace n\ns2 {
    use \Talbergs\LSP\DTO;

    class NN extends DTO
    {
        public int $int;
    }
}

// Test class NS.
namespace PHPUnit\Framework {
    use A;
    use AA;
    use AAA;
    use AAAA;
    use B;
    use E;
    use EEE;
    use E1;
    use E2;
    use E3;
    use F;
    use UnionMe;
    use Union1;
    use Union2;

    class DTOTest extends TestCase
    {
        public function clientRequestsFromLRealLife(): array
        {
            return [
                [
                    // Initialize request [client old]->[server]
                    '{ "initializationOptions": {}, "rootUri": "file:///home/ada", "workspaceFolders": [ { "uri": "file:///home/ada", "name": "/home/ada" } ], "rootPath": "/home/ada", "clientInfo": { "version": "0.5.1", "name": "Neovim" }, "processId": 220751, "trace": "off", "capabilities": { "workspace": { "workspaceFolders": true, "configuration": true, "workspaceEdit": { "resourceOperations": [ "rename", "create", "delete" ] }, "symbol": { "symbolKind": { "valueSet": [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26 ] }, "dynamicRegistration": false, "hierarchicalWorkspaceSymbolSupport": true }, "applyEdit": true }, "window": { "showDocument": { "support": false }, "showMessage": { "messageActionItem": { "additionalPropertiesSupport": false } }, "workDoneProgress": true }, "callHierarchy": { "dynamicRegistration": false }, "textDocument": { "documentSymbol": { "symbolKind": { "valueSet": [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26 ] }, "dynamicRegistration": false, "hierarchicalDocumentSymbolSupport": true }, "signatureHelp": { "signatureInformation": { "documentationFormat": [ "markdown", "plaintext" ] }, "dynamicRegistration": false }, "publishDiagnostics": { "relatedInformation": true, "tagSupport": { "valueSet": [ 1, 2 ] } }, "rename": { "prepareSupport": true, "dynamicRegistration": false }, "synchronization": { "didSave": true, "willSaveWaitUntil": false, "willSave": false, "dynamicRegistration": false }, "references": { "dynamicRegistration": false }, "definition": { "linkSupport": true }, "completion": { "completionItem": { "snippetSupport": false, "commitCharactersSupport": false, "preselectSupport": false, "deprecatedSupport": false, "documentationFormat": [ "markdown", "plaintext" ] }, "contextSupport": false, "dynamicRegistration": false, "completionItemKind": { "valueSet": [ 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25 ] } }, "documentHighlight": { "dynamicRegistration": false }, "implementation": { "linkSupport": true }, "hover": { "dynamicRegistration": false, "contentFormat": [ "markdown", "plaintext" ] }, "typeDefinition": { "linkSupport": true }, "declaration": { "linkSupport": true }, "codeAction": { "codeActionLiteralSupport": { "codeActionKind": { "valueSet": [ "", "Empty", "QuickFix", "Refactor", "RefactorExtract", "RefactorInline", "RefactorRewrite", "Source", "SourceOrganizeImports", "quickfix", "refactor", "refactor.extract", "refactor.inline", "refactor.rewrite", "source", "source.organizeImports" ] } }, "dynamicRegistration": false } } } }',
                    \Talbergs\LSP\InitializeParams::class,
                ],
                [
                    // Initialize request [client new]->[server]
                    '{"trace":"off","workspaceFolders":[{"uri":"file:\\/\\/\\/home\\/ada\\/Projects\\/php-language-server-lsp","name":"\\/home\\/ada\\/Projects\\/php-language-server-lsp"}],"capabilities":{"window":{"workDoneProgress":true,"showDocument":{"support":false},"showMessage":{"messageActionItem":{"additionalPropertiesSupport":false}}},"workspace":{"workspaceFolders":true,"symbol":{"hierarchicalWorkspaceSymbolSupport":true,"dynamicRegistration":false,"symbolKind":{"valueSet":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26]}},"workspaceEdit":{"resourceOperations":["rename","create","delete"]},"applyEdit":true,"configuration":true},"textDocument":{"references":{"dynamicRegistration":false},"publishDiagnostics":{"relatedInformation":true,"tagSupport":{"valueSet":[1,2]}},"typeDefinition":{"linkSupport":true},"rename":{"dynamicRegistration":false,"prepareSupport":true},"declaration":{"linkSupport":true},"codeAction":{"dataSupport":true,"resolveSupport":{"properties":["edit"]},"dynamicRegistration":false,"codeActionLiteralSupport":{"codeActionKind":{"valueSet":["","Empty","QuickFix","Refactor","RefactorExtract","RefactorInline","RefactorRewrite","Source","SourceOrganizeImports","quickfix","refactor","refactor.extract","refactor.inline","refactor.rewrite","source","source.organizeImports"]}}},"completion":{"contextSupport":false,"completionItem":{"insertReplaceSupport":true,"deprecatedSupport":true,"resolveSupport":{"properties":["documentation","detail","additionalTextEdits"]},"commitCharactersSupport":true,"tagSupport":{"valueSet":[1]},"labelDetailsSupport":true,"preselectSupport":true,"snippetSupport":true,"documentationFormat":["markdown","plaintext"]},"dynamicRegistration":false,"completionItemKind":{"valueSet":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25]}},"signatureHelp":{"dynamicRegistration":false,"signatureInformation":{"parameterInformation":{"labelOffsetSupport":true},"activeParameterSupport":true,"documentationFormat":["markdown","plaintext"]}},"documentHighlight":{"dynamicRegistration":false},"definition":{"linkSupport":true},"documentSymbol":{"hierarchicalDocumentSymbolSupport":true,"dynamicRegistration":false,"symbolKind":{"valueSet":[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26]}},"hover":{"dynamicRegistration":false,"contentFormat":["markdown","plaintext"]},"implementation":{"linkSupport":true},"synchronization":{"didSave":true,"willSave":false,"dynamicRegistration":false,"willSaveWaitUntil":false}},"callHierarchy":{"dynamicRegistration":false}},"processId":1821064,"initializationOptions":{},"rootUri":"file:\\/\\/\\/home\\/ada\\/Projects\\/php-language-server-lsp","clientInfo":{"name":"Neovim","version":"0.6.0"},"rootPath":"\\/home\\/ada\\/Projects\\/php-language-server-lsp"}',
                    \Talbergs\LSP\InitializeParams::class,
                ],
                [
                    // window/logMessage notification [server]->[client]
                    '{"type":3,"message":"Initialising intelephense 1.8.0"}',
                    \Talbergs\LSP\LogMessageParams::class,
                ],
                [
                    // Response to Initialize request [server]->[client]
                    '{"capabilities":{"textDocumentSync":2,"documentSymbolProvider":true,"workspaceSymbolProvider":true,"completionProvider":{"triggerCharacters":["$",">",":","\\\\","/","*",".","<"],"resolveProvider":true},"signatureHelpProvider":{"triggerCharacters":["(",",",":"]},"definitionProvider":true,"documentFormattingProvider":true,"documentRangeFormattingProvider":true,"referencesProvider":true,"hoverProvider":true,"documentHighlightProvider":true,"foldingRangeProvider":true,"implementationProvider":true,"declarationProvider":true,"workspace":{"workspaceFolders":{"supported":true,"changeNotifications":true}},"renameProvider":{"prepareProvider":true},"typeDefinitionProvider":true,"selectionRangeProvider":true,"codeActionProvider":true,"executeCommandProvider":{"commands":["intelephense.import.symbol","intelephense.implement.abstract.method.all","intelephense.phpdoc.add"]}}}',
                    \Talbergs\LSP\InitializeResult\InitializeResult::class,
                ],
                [
                    // workspace/didChangeConfiguration notification [client]->[server]
                    '{"settings":{"intelephense":{"environment":{"shortOpenTag":false},"completion":{"triggerParameterHints":false}}}}',
                    \Talbergs\LSP\DidChangeConfigurationParams::class,
                ],
                [
                    // textDocument/publishDiagnostics notification [server]->[client]
                    '{"uri":"file:///home/ada/Projects/php-language-server-lsp/src/LSP/DidChangeConfigurationClientCapabilities.php","diagnostics":[{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":6}},"message":"Unexpected \'Name\'.","severity":1,"code":1001,"source":"intelephense"}]}',
                    \Talbergs\LSP\PublishDiagnosticsParams::class,
                ],
                [
                    // textDocument/didChange notification [client]->[server]
                    '{"contentChanges":[{"rangeLength":1,"range":{"start":{"line":16,"character":5},"end":{"line":16,"character":6}},"text":""}],"textDocument":{"uri":"file:\\/\\/\\/home\\/ada\\/Projects\\/php-language-server-lsp\\/src\\/LSP\\/DidChangeConfigurationClientCapabilities.php","version":7}}',
                    \Talbergs\LSP\DidChangeTextDocumentParams::class,
                ],
                [
                    // completionItem/resolve request [client]->[server]
                    '{"sortText":"public","textEdit":{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":5}},"newText":"public"},"label":"public","kind":14}',
                    \Talbergs\LSP\CompletionItem::class,
                ],
                [
                    // textDocument/completion request [client]->[server]
                    '{"context":{"triggerCharacter":">","triggerKind":2},"position":{"line":18,"character":15},"textDocument":{"uri":"file:\\/\\/\\/home\\/ada\\/Projects\\/php-language-server-lsp\\/src\\/LSP\\/DidChangeConfigurationClientCapabilities.php"}}',
                    \Talbergs\LSP\CompletionParams::class,
                ],
                [
                    // textDocument/completion response [server]->[client]
                    '{"isIncomplete":false,"items":[{"label":"public","kind":14,"textEdit":{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":5}},"newText":"public"},"sortText":"public"},{"label":"private","kind":14,"textEdit":{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":5}},"newText":"private"},"sortText":"private"},{"label":"protected","kind":14,"textEdit":{"range":{"start":{"line":16,"character":4},"end":{"line":16,"character":5}},"newText":"protected"},"sortText":"protected"}]}',
                    \Talbergs\LSP\CompletionList::class,
                ],
                [
                    // textDocument/didOpen notification [client]->[server]
                    '{"textDocument":{"uri":"file:\/\/\/home\/ada\/Projects\/php-language-server-lsp\/src\/LSP\/CodeActionKind.php","languageId":"php","version":0,"text":"<?php\n\ndeclare(strict_types=1);"}}',
                    \Talbergs\LSP\DidOpenTextDocumentParams::class,
                ],
                [
                    // workspace/configuration notification [server]->[client]
                    '{"items":[{"section":"intelephense"},{"section":"intelephense","scopeUri":"file:///home/ada/Projects/php-language-server-lsp"}]}',
                    \Talbergs\LSP\ConfigurationParams::class,
                ],
                [
                    // textDocument/didSave notification [client]->[server]
                    '{"textDocument":{"uri":"file:\\/\\/\\/home\\/ada\\/Projects\\/php-language-server-lsp\\/src\\/LSP\\/DidChangeConfigurationClientCapabilities.php"}}',
                    \Talbergs\LSP\DidSaveTextDocumentParams::class,
                ],
            ];
        }

        /**
         * @dataProvider clientRequestsFromLRealLife
         */
        public function testRequests(string $params, string $dtoClass)
        {
            $this->assertNotNull($dtoClass::fromJson($params));
        }

        public function testNamedConstruction()
        {
            $this->assertEquals(
                '{"aa":{"aaa":{"int":1}}}',
                json_encode(A::fromNamed(aa: AA::fromNamed(aaa: AAA::fromNamed(int: 1)))),
            );
        }

        public function testArrayOfObjects()
        {
            $this->assertEquals(
                '{"bbList":[{"int":1},{"int":2}],"bbOne":{"int":1},"primitive":1}',
                json_encode(B::fromNamed(
                    bbList: [['int' => 1], ['int' => 2]],
                    bbOne: ['int' => 1],
                    primitive: 1,
                )),
            );
        }

        public function testEnumString()
        {
            $this->assertEquals(
                '{"value":"one"}',
                json_encode(E::fromNamed(value: "one")),
            );
        }

        public function testEnumInt()
        {
            $this->assertEquals(
                '{"value":1}',
                json_encode(EEE::fromNamed(value: 1)),
            );
        }

        public function testListOfStringEnums()
        {
            $this->assertEquals(
                '{"value":["one"]}',
                json_encode(E1::fromNamed(value: ["one"])),
            );
        }

        public function testListOfIntEnums()
        {
            $this->assertEquals(
                '{"value":[1]}',
                json_encode(E2::fromNamed(value: [1])),
            );
        }

        public function testListOfStrings()
        {
            $this->assertEquals(
                '{"value":["one"]}',
                json_encode(E3::fromNamed(value: ["one"])),
            );
        }

        public function testMixed()
        {
            $this->assertEquals(
                '{"value1":["one"],"value2":1,"value3":null}',
                json_encode(F::fromNamed(value1: ["one"], value2: 1)),
            );
        }

        public function testBoolean()
        {
            $this->assertEquals(
                '{"value":true}',
                json_encode(AAAA::fromNamed(value: true)),
            );
        }

        public function testNamespacesForListOfObjects()
        {
            $shape = [['int' => 1]];
            $o = \n\ns1\N::fromNamed(nn1: $shape, nn2: $shape);

            $this->assertInstanceOf(\n\ns1\NN::class, $o->nn1[0]);
            $this->assertInstanceOf(\n\ns2\NN::class, $o->nn2[0]);
        }

        public function testUnionTypesCast()
        {
            $o = UnionMe::fromNamed(value: ['union2' => 1]);
            $this->assertInstanceOf(Union2::class, $o->value);

            $o = UnionMe::fromNamed(value: ['union1' => 1]);
            $this->assertInstanceOf(Union1::class, $o->value);
        }
    }
}
