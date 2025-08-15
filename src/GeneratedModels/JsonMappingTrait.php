<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

/**
 * Trait for JSON mapping with built-in PHP features
 * Uses PHP's built-in DateTime and reflection capabilities
 */
trait JsonMappingTrait
{
    /**
     * Parse DateTime using PHP's built-in DateTime class
     */
    protected static function parseDateTime($value): ?\DateTime
    {
        if ($value === null) {
            return null;
        }
        
        // Use PHP's built-in DateTime::createFromFormat for timestamps
        if (is_int($value)) {
            // Handle nanosecond timestamps from Stream API
            $seconds = intval($value / 1000000000);
            return \DateTime::createFromFormat('U', (string)$seconds) ?: null;
        }
        
        // Use DateTime constructor for ISO strings
        if (is_string($value)) {
            try {
                return new \DateTime($value);
            } catch (\Exception $e) {
                return null;
            }
        }
        
        return null;
    }

    /**
     * Parse object using PHP's built-in stdClass
     */
    protected static function parseObject($value): ?object
    {
        if ($value === null) {
            return null;
        }
        
        // Use PHP's built-in (object) cast
        return is_array($value) ? (object)$value : $value;
    }

    /**
     * Parse nested model using PHP's built-in reflection
     */
    protected static function parseNestedModel($value, string $modelClass): ?object
    {
        if ($value === null || !is_array($value)) {
            return null;
        }
        
        // Use PHP's built-in class_exists and method_exists
        if (class_exists($modelClass) && method_exists($modelClass, 'fromJson')) {
            return $modelClass::fromJson($value);
        }
        
        return null;
    }
}
