<?php

declare(strict_types=1);

namespace GetStream\Utils;

/**
 * Utility class for common JSON parsing operations.
 */
class JsonParsingUtils
{
    /**
     * Parse DateTime from various formats (timestamp, ISO string, etc.).
     */
    public static function parseDateTime(mixed $value): ?\DateTime
    {
        if ($value === null) {
            return null;
        }

        if (is_int($value)) {
            // Handle nanosecond timestamps from Stream API
            return new \DateTime('@' . (int) ($value / 1000000000));
        }

        if (is_string($value)) {
            return new \DateTime($value);
        }

        return null;
    }

    /**
     * Parse object from array or return as-is.
     */
    public static function parseObject(mixed $value): ?object
    {
        if ($value === null) {
            return null;
        }

        if (is_array($value)) {
            return (object) $value;
        }

        return $value;
    }

    /**
     * Parse nested model from array data.
     */
    public static function parseNestedModel(mixed $value, string $modelClass): ?object
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
