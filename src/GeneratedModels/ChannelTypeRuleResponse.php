<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelTypeRuleResponse extends BaseModel
{
    public function __construct(
        public ?string $channelType = null,
        public ?int $maxAgeHours = null,
        public ?\DateTime $enabledAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
