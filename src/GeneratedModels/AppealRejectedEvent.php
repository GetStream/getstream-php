<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when an appeal is rejected
 */
class AppealRejectedEvent extends BaseModel
{
    public function __construct(
        public ?AppealItemResponse $appeal = null,
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
