<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $action
 * @property string $originalText
 * @property string|null $blocklistMatched
 * @property bool|null $platformCircumvented
 * @property string|null $semanticFilterMatched
 * @property array|null $imageHarms
 * @property array|null $textHarms
 */
class ModerationV2Response extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $originalText = null,
        public ?string $blocklistMatched = null,
        public ?bool $platformCircumvented = null,
        public ?string $semanticFilterMatched = null,
        public ?array $imageHarms = null,
        public ?array $textHarms = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
