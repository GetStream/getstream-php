<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AddCommentReactionRequest implements JsonSerializable
{
    public function __construct(public ?string $type = null,
        public ?bool $createNotificationActivity = null,
        public ?string $userID = null,
        public ?object $custom = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'type' => $this->type,
            'create_notification_activity' => $this->createNotificationActivity,
            'user_id' => $this->userID,
            'custom' => $this->custom,
            'user' => $this->user,
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
        
        return new static(type: $json['type'] ?? null,
            createNotificationActivity: $json['create_notification_activity'] ?? null,
            userID: $json['user_id'] ?? null,
            custom: $json['custom'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
