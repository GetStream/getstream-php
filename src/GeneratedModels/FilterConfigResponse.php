<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array $llmLabels
 * @property array|null $aiTextLabels
 */
class FilterConfigResponse extends BaseModel
{
    public function __construct(
        public ?array $llmLabels = null,
        public ?array $aiTextLabels = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
