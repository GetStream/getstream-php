<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateLiveLocationRequest implements JsonSerializable
{
    public function __construct(public ?string $messageID = null,
        public ?\DateTime $endAt = null,
        public ?int $latitude = null,
        public ?int $longitude = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'message_id' => $this->messageID,
            'end_at' => $this->endAt,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
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
        
        return new static(messageID: $json['message_id'] ?? null,
            endAt: $json['end_at'] ?? null,
            latitude: $json['latitude'] ?? null,
            longitude: $json['longitude'] ?? null
        );
    }
} 
