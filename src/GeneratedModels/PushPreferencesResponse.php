<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PushPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?FeedsPreferencesResponse $feedsPreferences = null,
        public ?string $chatLevel = null,
        public ?string $callLevel = null,
        public ?string $feedsLevel = null,
        public ?\DateTime $disabledUntil = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
