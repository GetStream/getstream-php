<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AddCommentRequest implements JsonSerializable
{
    public function __construct(public ?string $comment = null,
        public ?string $objectID = null,
        public ?string $objectType = null,
        public ?bool $createNotificationActivity = null,
        public ?string $parentID = null,
        public ?string $userID = null,
        public ?array $attachments = null,
        public ?array $mentionedUserIds = null,
        public ?object $custom = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'comment' => $this->comment,
            'object_id' => $this->objectID,
            'object_type' => $this->objectType,
            'create_notification_activity' => $this->createNotificationActivity,
            'parent_id' => $this->parentID,
            'user_id' => $this->userID,
            'attachments' => $this->attachments,
            'mentioned_user_ids' => $this->mentionedUserIds,
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
        
        return new static(comment: $json['comment'] ?? null,
            objectID: $json['object_id'] ?? null,
            objectType: $json['object_type'] ?? null,
            createNotificationActivity: $json['create_notification_activity'] ?? null,
            parentID: $json['parent_id'] ?? null,
            userID: $json['user_id'] ?? null,
            attachments: $json['attachments'] ?? null,
            mentionedUserIds: $json['mentioned_user_ids'] ?? null,
            custom: $json['custom'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
