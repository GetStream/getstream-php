<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelDataUpdate extends BaseModel
{
    public function __construct(
        public ?bool $frozen = null,
        public ?bool $disabled = null,
        public ?object $custom = null,
        public ?string $team = null,
        public ?ChannelConfig $configOverrides = null,
        public ?bool $autoTranslationEnabled = null,
        public ?string $autoTranslationLanguage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
