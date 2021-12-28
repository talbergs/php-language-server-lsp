<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Represents a diagnostic, such as a compiler error or warning. Diagnostic
 * objects are only valid in the scope of a resource.
 */
class Diagnostic extends DTO
{
	/**
	 * The range at which the message applies.
	 */
	public Range $range;

	/**
	 * The diagnostic's severity. Can be omitted. If omitted it is up to the
	 * client to interpret diagnostics as error, warning, info or hint.
	 */
	public ?DiagnosticSeverity $severity = null;

	/**
	 * The diagnostic's code, which might appear in the user interface.
	 */
	public null|int|string $code = null;

	/**
	 * An optional property to describe the error code.
	 *
	 * @since 3.16.0
	 */
	public ?CodeDescription $codeDescription = null;

	/**
	 * A human-readable string describing the source of this
	 * diagnostic, e.g. 'typescript' or 'super lint'.
	 */
	public ?string $source = null;

	/**
	 * The diagnostic's message.
	 */
	public string $message;

	/**
	 * Additional metadata about the diagnostic.
	 *
	 * @since 3.15.0
	 *
	 * @var DiagnosticTag[]
	 */
	public ?array $tags = null;

	/**
	 * An array of related diagnostic information, e.g. when symbol-names within
	 * a scope collide all definitions can be marked via this property.
	 *
	 * @var DiagnosticRelatedInformation[] 
	 */
	public ?array $relatedInformation = null;

	/**
	 * A data entry field that is preserved between a
	 * `textDocument/publishDiagnostics` notification and
	 * `textDocument/codeAction` request.
	 *
	 * @since 3.16.0
	 */
	public mixed $data = null;
}
