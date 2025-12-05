<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $configKey
 * @property array $dataTypes
 */
class FeedsModerationTemplateConfig extends BaseModel
{
    public function __construct(
        public ?string $configKey = null,
        public ?array $dataTypes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
