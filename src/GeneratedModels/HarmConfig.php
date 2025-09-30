<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class HarmConfig extends BaseModel
{
    public function __construct(
        public ?int $cooldownPeriod = null,
        public ?int $severity = null,
        public ?int $threshold = null,
        public ?array $actionSequences = null,
        public ?array $harmTypes = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
