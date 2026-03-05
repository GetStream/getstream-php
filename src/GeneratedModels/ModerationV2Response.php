<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationV2Response extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $originalText = null,
        public ?array $textHarms = null,
        public ?array $imageHarms = null,
        public ?string $blocklistMatched = null,
        public ?array $blocklistsMatched = null,
        public ?string $semanticFilterMatched = null,
        public ?bool $platformCircumvented = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
