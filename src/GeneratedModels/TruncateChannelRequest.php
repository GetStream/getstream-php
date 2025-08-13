<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class TruncateChannelRequest implements JsonSerializable
{
    public function __construct(public ?bool $hardDelete = null,
        public ?bool $skipPush = null,
        public ?\DateTime $truncatedAt = null,
        public ?string $userID = null,
        public ?array $memberIds = null,
        public ?MessageRequest $message = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'hard_delete' => $this->hardDelete,
            'skip_push' => $this->skipPush,
            'truncated_at' => $this->truncatedAt,
            'user_id' => $this->userID,
            'member_ids' => $this->memberIds,
            'message' => $this->message,
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
        
        return new static(hardDelete: $json['hard_delete'] ?? null,
            skipPush: $json['skip_push'] ?? null,
            truncatedAt: $json['truncated_at'] ?? null,
            userID: $json['user_id'] ?? null,
            memberIds: $json['member_ids'] ?? null,
            message: $json['message'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
