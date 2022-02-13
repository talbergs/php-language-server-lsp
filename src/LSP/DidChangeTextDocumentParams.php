<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * The document change notification is sent from the client to the server to
 * signal changes to a text document. Before a client can change a text
 * document it must claim ownership of its content using the
 * textDocument/didOpen notification. In 2.0 the shape of the params has
 * changed to include proper version numbers.
 */
class DidChangeTextDocumentParams extends DTO
{
    /**
	 * The document that did change. The version number points
	 * to the version after all provided content changes have
	 * been applied.
	 */
	public VersionedTextDocumentIdentifier $textDocument;

	/**
	 * The actual content changes. The content changes describe single state
	 * changes to the document. So if there are two content changes c1 (at
	 * array index 0) and c2 (at array index 1) for a document in state S then
	 * c1 moves the document from S to S' and c2 from S' to S''. So c1 is
	 * computed on the state S and c2 is computed on the state S'.
	 *
	 * To mirror the content of a document using change events use the following
	 * approach:
	 * - start with the same initial content
	 * - apply the 'textDocument/didChange' notifications in the order you
	 *   receive them.
	 * - apply the `TextDocumentContentChangeEvent`s in a single notification
	 *   in the order you receive them.
     *
     * @var TextDocumentContentChangeEvent[]
	 */
	public array $contentChanges;
}
