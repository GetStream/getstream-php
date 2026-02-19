<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SegmentTargetResponse extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?string $segmentID = null,
        public ?string $targetID = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
