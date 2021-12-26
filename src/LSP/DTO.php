<?php

declare(strict_types=1);

namespace Talbergs\LSP;

/**
 * Data transfer object that deliberately does not allow to map arbitrary structure paths
 * into object field values - all field names must match exactly the given JSON.
 */
abstract class DTO
{
    /**
     * If set to true, improves performance and will fail to hydrate object when excess input is sent.
     * Useful when implementing LSP client.
     */
    private static $strictMode = false;
    public static function enableStrictMode(): void
    {
        self::$strictMode = true;
    }

    public static function disableStrictMode(): void
    {
        self::$strictMode = false;
    }

    private static ?\ReflectionClass $reflection = null;

    // public static function from(... $args): static
    // {}
    // public static function tryFrom(... $args): ?static
    // {}

    private static function x(array $args): static
    {
        static::$reflection = null;
        if (static::$reflection === null) {
            static::$reflection = new \ReflectionClass(static::class);
        }

        $reflection = new \ReflectionClass(static::class);

        // $instance = $reflection->newInstanceWithoutConstructor();
        $instance = new static;

        $requiredFields = array_flip(array_map(
            fn (\ReflectionProperty $property) => $property->getName(),
            array_filter(
                $reflection->getProperties(\ReflectionProperty::IS_PUBLIC),
                fn (\ReflectionProperty $property) => !$property->hasDefaultValue(),
            ),
        ));

        foreach ($args as $key => $value) {
            unset($requiredFields[$key]);

            if (!static::$strictMode && !$reflection->hasProperty($key)) {
                // TODO: log error.
                continue;
            }
            $property = $reflection->getProperty($key);
            $instance->{$key} = gettype($value) === 'object' ? $value : static::map($property, $value);
        }

        if ($requiredFields) {
            throw new \Exception(
                'Not all fields are given in JSON. Missing '
                . implode(',', array_keys($requiredFields))
            );
        }

        return $instance;
    }

    private static function listType(\ReflectionProperty $property): string
    {
        $doc = $property->getDocComment();
        preg_match('#@var (?P<type>.*)\[\]#', $doc, $captures);
        if (!array_key_exists('type', $captures)) {
            throw new \Exception(__METHOD__ . ' can\'t ' . $property->class . '::' . $property->name);
        }
        ['type' => $type] = $captures;

        if ($type[0] === '\\' || $type === 'string') {
            return $type;
        }

        return $property->getDeclaringClass()->getNamespaceName() . '\\' . $type;
    }

    private static function map(\ReflectionProperty $property, mixed $value, ?string $nameToUse = null): mixed
    {
        $type = $property->getType();
        if ($nameToUse === null && $type instanceof \ReflectionUnionType) {
            $namedTypes = $type->getTypes();
            $namedTypes = array_map(fn ($n) => $n->getName(), $namedTypes);
            usort($namedTypes, fn ($n) => enum_exists($n) ? -1 : 1);
            usort($namedTypes, fn ($n) => class_exists($n) ? -1 : 1);
            while ($namedType = array_shift($namedTypes)) {
                try {
                    return static::map($property, $value, $namedType);
                } catch (\Exception $e) {
                    // d($e);
                }
            }
            throw new \Exception("None of union types could cast.");
        }

        $typeName = $nameToUse ?? $type->getName();
        
        if ($typeName === 'mixed') {
            return $value;
        }

        $castBuiltIn = fn (mixed $value) => $value;
        $castEnum = static::$strictMode
            ? fn (int|string $value) => $typeName::from($value)
            : fn (int|string $value) => $typeName::tryFrom($value);

        $castEnumList = function (array $value) use ($property): array {
            $typeName = static::listType($property);
            if ($typeName === 'string') {
                return array_map(fn (string $value) => $value, $value);
            }

            if (static::$strictMode) {
                return array_map(fn (string|int $value) => $typeName::from($value), $value);
            } else {
                return array_filter(array_map(fn (string|int $value) => $typeName::tryFrom($value), $value));
            }
        };
        $castDTO = fn (array $value) => $typeName::fromArr($value);
        $castDTOList = function (array $value) use ($property): array {
            $typeName = static::listType($property);
            return array_map(fn (array $value) => $typeName::fromArr($value), $value);
        };

        $startegy = match (gettype($value)) {
            'NULL' => $castBuiltIn,
            'boolean' => $castBuiltIn,
            'string' => enum_exists($typeName) ? $castEnum : $castBuiltIn,
            'integer' => enum_exists($typeName) ? $castEnum : $castBuiltIn,
            'array' => array_is_list($value)
                ? (is_string($value[0] ?? null) || is_int($value[0] ?? null) ? $castEnumList : $castDTOList)
                : $castDTO,
        };

        $result = $startegy($value);

        return $result;
    }

    /**
     * Succeeds if all structure fields were initialized.
     * Succeeds if JSON has only known fields.
     */
    public static function fromArr(array $args): static
    {
        return static::x($args);
    }

    public static function fromNamed(... $args): static
    {
        return static::fromArr($args);
    }

    public static function fromJson(string $args): static
    {
        return static::fromArr(json_decode($args, true));
    }

    public function toArr(): array
    {
        $result = [];

        foreach (get_object_vars($this) as $key => $value) {
            if ($value instanceof DTO) {
                $value = $value->toArr();
            }

            $result[$key] = $value;
        }

        return $result;
    }
}
