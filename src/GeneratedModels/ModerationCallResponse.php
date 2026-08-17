<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationCallResponse extends BaseModel
{
    public function __construct(
        public ?string $cid = null,
        public ?string $id = null,
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $currentSessionID = null,
        public ?bool $backstage = null,
        public ?object $custom = null,
        public ?array $blockedUserIds = null,
        public ?UserResponse $createdBy = null, // User response object
        public ?\DateTime $endedAt = null,
        public ?\DateTime $startsAt = null,
        public ?string $team = null,
        public ?string $channelCid = null,
        public ?bool $recording = null,
        public ?bool $transcribing = null,
        public ?bool $captioning = null,
        public ?bool $translating = null,
        public ?int $joinAheadTimeSeconds = null,
        public ?string $routingNumber = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
