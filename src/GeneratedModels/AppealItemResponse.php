<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $appealReason
 * @property \DateTime $createdAt
 * @property string $entityID
 * @property string $entityType
 * @property string $id
 * @property string $status
 * @property \DateTime $updatedAt
 * @property string|null $decisionReason
 * @property array|null $attachments
 * @property ModerationPayload|null $entityContent
 * @property UserResponse|null $user
 */
class AppealItemResponse extends BaseModel
{
    public function __construct(
        public ?string $appealReason = null, // Reason Text of the Appeal Item
        public ?\DateTime $createdAt = null, // When the flag was created
        public ?string $entityID = null, // ID of the entity
        public ?string $entityType = null, // Type of entity
        public ?string $id = null,
        public ?string $status = null, // Status of the Appeal Item
        public ?\DateTime $updatedAt = null, // When the flag was last updated
        public ?string $decisionReason = null, // Decision Reason of the Appeal Item
        public ?array $attachments = null, // Attachments(e.g. Images) of the Appeal Item
        public ?ModerationPayload $entityContent = null,
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
