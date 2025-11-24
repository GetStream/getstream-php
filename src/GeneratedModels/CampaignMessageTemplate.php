<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CampaignMessageTemplate extends BaseModel
{
    public function __construct(
        public ?string $pollID = null,
        public ?bool $searchable = null,
        public ?string $text = null,
        public ?array $attachments = null,
        public ?object $custom = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
