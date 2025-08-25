<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PushPreferences extends BaseModel
{
    public function __construct(
        public ?string $callLevel = null,
        public ?string $chatLevel = null,
        public ?\DateTime $disabledUntil = null,
        public ?string $feedsLevel = null,
        public ?FeedsEventPreferences $feedsEvents = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
