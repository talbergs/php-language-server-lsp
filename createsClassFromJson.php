<?php

interface HidrateStruct
{
    public function fromJSON(string $json): static;
    public function getError();
}

// Class that hydrates "initialize" structure / mapper
final class Initialize implements HidrateStruct
{
    public function fromJSON(string $json): static
    {
        $instance = new self();

        return $instance;
    }

    public function getError()
    {}
}

$jason = '
{
  "method": "initialize",
  "jsonrpc": "2.0",
  "id": 1,
  "params": {
    "initializationOptions": {},
    "rootUri": "file:///home/ada",
    "workspaceFolders": [
      {
        "uri": "file:///home/ada",
        "name": "/home/ada"
      }
    ],
    "rootPath": "/home/ada",
    "clientInfo": {
      "version": "0.5.1",
      "name": "Neovim"
    },
    "processId": 220751,
    "trace": "off",
    "capabilities": {
      "workspace": {
        "workspaceFolders": true,
        "configuration": true,
        "workspaceEdit": {
          "resourceOperations": [
            "rename",
            "create",
            "delete"
          ]
        },
        "symbol": {
          "symbolKind": {
            "valueSet": [
              1,
              2,
              3,
              4,
              5,
              6,
              7,
              8,
              9,
              10,
              11,
              12,
              13,
              14,
              15,
              16,
              17,
              18,
              19,
              20,
              21,
              22,
              23,
              24,
              25,
              26
            ]
          },
          "dynamicRegistration": false,
          "hierarchicalWorkspaceSymbolSupport": true
        },
        "applyEdit": true
      },
      "window": {
        "showDocument": {
          "support": false
        },
        "showMessage": {
          "messageActionItem": {
            "additionalPropertiesSupport": false
          }
        },
        "workDoneProgress": true
      },
      "callHierarchy": {
        "dynamicRegistration": false
      },
      "textDocument": {
        "documentSymbol": {
          "symbolKind": {
            "valueSet": [
              1,
              2,
              3,
              4,
              5,
              6,
              7,
              8,
              9,
              10,
              11,
              12,
              13,
              14,
              15,
              16,
              17,
              18,
              19,
              20,
              21,
              22,
              23,
              24,
              25,
              26
            ]
          },
          "dynamicRegistration": false,
          "hierarchicalDocumentSymbolSupport": true
        },
        "signatureHelp": {
          "signatureInformation": {
            "documentationFormat": [
              "markdown",
              "plaintext"
            ]
          },
          "dynamicRegistration": false
        },
        "publishDiagnostics": {
          "relatedInformation": true,
          "tagSupport": {
            "valueSet": [
              1,
              2
            ]
          }
        },
        "rename": {
          "prepareSupport": true,
          "dynamicRegistration": false
        },
        "synchronization": {
          "didSave": true,
          "willSaveWaitUntil": false,
          "willSave": false,
          "dynamicRegistration": false
        },
        "references": {
          "dynamicRegistration": false
        },
        "definition": {
          "linkSupport": true
        },
        "completion": {
          "completionItem": {
            "snippetSupport": false,
            "commitCharactersSupport": false,
            "preselectSupport": false,
            "deprecatedSupport": false,
            "documentationFormat": [
              "markdown",
              "plaintext"
            ]
          },
          "contextSupport": false,
          "dynamicRegistration": false,
          "completionItemKind": {
            "valueSet": [
              1,
              2,
              3,
              4,
              5,
              6,
              7,
              8,
              9,
              10,
              11,
              12,
              13,
              14,
              15,
              16,
              17,
              18,
              19,
              20,
              21,
              22,
              23,
              24,
              25
            ]
          }
        },
        "documentHighlight": {
          "dynamicRegistration": false
        },
        "implementation": {
          "linkSupport": true
        },
        "hover": {
          "dynamicRegistration": false,
          "contentFormat": [
            "markdown",
            "plaintext"
          ]
        },
        "typeDefinition": {
          "linkSupport": true
        },
        "declaration": {
          "linkSupport": true
        },
        "codeAction": {
          "codeActionLiteralSupport": {
            "codeActionKind": {
              "valueSet": [
                "",
                "Empty",
                "QuickFix",
                "Refactor",
                "RefactorExtract",
                "RefactorInline",
                "RefactorRewrite",
                "Source",
                "SourceOrganizeImports",
                "quickfix",
                "refactor",
                "refactor.extract",
                "refactor.inline",
                "refactor.rewrite",
                "source",
                "source.organizeImports"
              ]
            }
          },
          "dynamicRegistration": false
        }
      }
    }
  }
}
';
