<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CampaignChannelTemplate extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?object $custom = null,
        public ?string $id = null,
        public ?string $team = null,
        public ?array $members = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
