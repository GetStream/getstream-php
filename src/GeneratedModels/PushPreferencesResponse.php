<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $callLevel
 * @property string|null $chatLevel
 * @property \DateTime|null $disabledUntil
 * @property string|null $feedsLevel
 * @property FeedsPreferencesResponse|null $feedsPreferences
 */
class PushPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?string $callLevel = null,
        public ?string $chatLevel = null,
        public ?\DateTime $disabledUntil = null,
        public ?string $feedsLevel = null,
        public ?FeedsPreferencesResponse $feedsPreferences = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
