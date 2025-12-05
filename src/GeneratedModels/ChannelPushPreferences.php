<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $chatLevel
 * @property \DateTime|null $disabledUntil
 */
class ChannelPushPreferences extends BaseModel
{
    public function __construct(
        public ?string $chatLevel = null,
        public ?\DateTime $disabledUntil = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
