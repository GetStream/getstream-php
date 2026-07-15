<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AIAudioConfigResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null,
        public ?string $profile = null,
        /** @var array<BodyguardRule>|null */
        #[ArrayOf(BodyguardRule::class)]
        public ?array $rules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
