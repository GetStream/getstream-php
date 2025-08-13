<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SharedLocationResponseData implements JsonSerializable
{
    public function __construct(public ?string $channelCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $createdByDeviceID = null,
        public ?int $latitude = null,
        public ?int $longitude = null,
        public ?string $messageID = null,
        public ?\DateTime $updatedAt = null,
        public ?string $userID = null,
        public ?\DateTime $endAt = null,
        public ?ChannelResponse $channel = null,
        public ?MessageResponse $message = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channel_cid' => $this->channelCid,
            'created_at' => $this->createdAt,
            'created_by_device_id' => $this->createdByDeviceID,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'message_id' => $this->messageID,
            'updated_at' => $this->updatedAt,
            'user_id' => $this->userID,
            'end_at' => $this->endAt,
            'channel' => $this->channel,
            'message' => $this->message,
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
        
        return new static(channelCid: $json['channel_cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            createdByDeviceID: $json['created_by_device_id'] ?? null,
            latitude: $json['latitude'] ?? null,
            longitude: $json['longitude'] ?? null,
            messageID: $json['message_id'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            userID: $json['user_id'] ?? null,
            endAt: $json['end_at'] ?? null,
            channel: $json['channel'] ?? null,
            message: $json['message'] ?? null
        );
    }
} 
