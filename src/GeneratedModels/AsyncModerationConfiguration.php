<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AsyncModerationConfiguration implements JsonSerializable
{
    public function __construct(public ?int $timeoutMs = null,
        public ?AsyncModerationCallbackConfig $callback = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'timeout_ms' => $this->timeoutMs,
            'callback' => $this->callback,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(timeoutMs: $json['timeout_ms'] ?? null,
            callback: $json['callback'] ?? null
        );
    }
} 
