<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $appPk
 * @property \DateTime $createdAt
 * @property string $segmentID
 * @property string $targetID
 */
class SegmentTargetResponse extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?\DateTime $createdAt = null,
        public ?string $segmentID = null,
        public ?string $targetID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
