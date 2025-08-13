<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * StartRTMPBroadcastsRequest is the payload for starting RTMP broadcasts.
 */
class StartRTMPBroadcastsRequest implements JsonSerializable
{
    public function __construct(public ?array $broadcasts = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'broadcasts' => $this->broadcasts,
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
        
        return new static(broadcasts: $json['broadcasts'] ?? null
        );
    }
} 
