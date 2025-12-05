<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $nextState
 * @property string $prevState
 */
class ImportTaskHistory extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $nextState = null,
        public ?string $prevState = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
