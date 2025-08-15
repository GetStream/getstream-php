<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AWSRekognitionRule extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $label = null,
        public ?int $minConfidence = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
