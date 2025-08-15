<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use GetStream\StreamResponse;
use JsonSerializable;

/**
 * Attribute to specify custom JSON key mapping
 */
#[\Attribute(\Attribute::TARGET_PARAMETER)]
class JsonKey
{
    public function __construct(public string $key) {}
}
/**
 * Base class for all generated models with automatic JSON parsing based on constructor types
 */
abstract class BaseModel implements JsonSerializable
{
    /** @var array Cache for reflection data to avoid repeated reflection calls */
    private static array $reflectionCache = [];

    /**
     * Automatically create instance from JSON data using reflection and type hints
     * 
     * @param array|string $json JSON data
     * @return static
     * @phpstan-return static
     */
    public static function fromJson($json)
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }

        $reflection = new \ReflectionClass(static::class);
        $constructor = $reflection->getConstructor();
        
        if (!$constructor) {
            /** @phpstan-ignore-next-line */
            return new static();
        }

        $args = [];
        foreach ($constructor->getParameters() as $param) {
            $paramName = $param->getName();
            
            // Check for custom JsonKey attribute
            $jsonKey = self::getJsonKey($param);
            $value = $json[$jsonKey] ?? null;
            
            // Auto-detect parsing based on parameter type
            $args[$paramName] = self::parseValueByType($value, $param);
        }

        /** @phpstan-ignore-next-line */
        return new static(...$args);
    }

    /**
     * Parse value based on parameter type information
     */
    private static function parseValueByType(mixed $value, \ReflectionParameter $param): mixed
    {
        if ($value === null) {
            return null;
        }

        $type = $param->getType();
        if (!$type instanceof \ReflectionNamedType) {
            return $value; // Can't determine type, return as-is
        }

        $typeName = $type->getName();

        // Handle different types automatically
        switch ($typeName) {
            case 'DateTime':
                return self::parseDateTime($value);
            
            case 'object':
                return self::parseObject($value);
            
            case 'string':
            case 'int':
            case 'float':
            case 'bool':
            case 'array':
                return $value; // Primitive types, return as-is
            
            default:
                // Check if it's a BaseModel subclass (nested model)
                if (class_exists($typeName) && is_subclass_of($typeName, BaseModel::class)) {
                    return self::parseNestedModel($value, $typeName);
                }
                return $value;
        }
    }

    /**
     * Get JSON key for a parameter, checking for JsonKey attribute first
     */
    private static function getJsonKey(\ReflectionParameter $param): string
    {
        $attributes = $param->getAttributes(JsonKey::class);
        if (!empty($attributes)) {
            return $attributes[0]->newInstance()->key;
        }
        
        return self::camelToSnake($param->getName());
    }

    /**
     * Convert camelCase to snake_case for JSON key mapping
     */
    private static function camelToSnake(string $camelCase): string
    {
        $result = preg_replace('/([a-z])([A-Z])/', '$1_$2', $camelCase);
        return strtolower($result ?? $camelCase);
    }

    /**
     * Automatic JSON serialization using reflection and property types
     */
    public function jsonSerialize(): array
    {
        $result = [];
        $reflection = new \ReflectionClass($this);
        $constructor = $reflection->getConstructor();
        
        if (!$constructor) {
            return [];
        }

        foreach ($constructor->getParameters() as $param) {
            $paramName = $param->getName();
            $value = $this->$paramName;
            
            if ($value === null) {
                continue; // Skip null values
            }

            $jsonKey = self::getJsonKey($param);
            $result[$jsonKey] = $this->serializeValue($value);
        }

        return $result;
    }

    /**
     * Serialize a value based on its type
     */
    private function serializeValue(mixed $value): mixed
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof \DateTime) {
            // Convert to nanosecond timestamp for Stream API compatibility
            return (int)($value->getTimestamp() * 1000000000);
        }

        if ($value instanceof BaseModel) {
            return $value->jsonSerialize();
        }

        if (is_array($value)) {
            return array_map([$this, 'serializeValue'], $value);
        }

        if (is_object($value) && !($value instanceof \stdClass)) {
            // Convert objects to arrays if they have jsonSerialize
            if (method_exists($value, 'jsonSerialize')) {
                return $value->jsonSerialize();
            }
            return (array)$value;
        }

        return $value;
    }

    /**
     * Convert to array (alias for jsonSerialize for backward compatibility)
     */
    public function toArray(): array
    {
        return $this->jsonSerialize();
    }
    
    /**
     * Parse DateTime from various formats (timestamp, ISO string, etc.)
     */
    protected static function parseDateTime(mixed $value): ?\DateTime
    {
        if ($value === null) {
            return null;
        }
        
        if (is_int($value)) {
            // Handle nanosecond timestamps from Stream API
            return new \DateTime('@' . intval($value / 1000000000));
        }
        
        if (is_string($value)) {
            return new \DateTime($value);
        }
        
        return null;
    }

    /**
     * Parse object from array or return as-is
     */
    protected static function parseObject(mixed $value): ?object
    {
        if ($value === null) {
            return null;
        }
        
        if (is_array($value)) {
            return (object)$value;
        }
        
        return $value;
    }

    /**
     * Parse nested model from array data
     */
    protected static function parseNestedModel(mixed $value, string $modelClass): ?object
    {
        if ($value === null || !is_array($value)) {
            return null;
        }
        
        if (class_exists($modelClass) && method_exists($modelClass, 'fromJson')) {
            return $modelClass::fromJson($value);
        }
        
        return null;
    }
}
