<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AppealItemResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?UserResponse $user = null,
        public ?string $entityType = null, // Type of entity
        public ?string $entityID = null, // ID of the entity
        public ?ModerationPayload $entityContent = null,
        public ?string $appealReason = null, // Reason Text of the Appeal Item
        public ?string $status = null, // Status of the Appeal Item
        public ?string $decisionReason = null, // Decision Reason of the Appeal Item
        public ?array $attachments = null, // Attachments(e.g. Images) of the Appeal Item
        public ?\DateTime $createdAt = null, // When the flag was created
        public ?\DateTime $updatedAt = null, // When the flag was last updated
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
