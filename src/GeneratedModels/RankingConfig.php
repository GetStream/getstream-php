<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RankingConfig extends BaseModel
{
    public function __construct(
        public ?string $score = null,    // Scoring formula 
        public ?string $type = null,    // Type of ranking algorithm 
        public ?object $defaults = null,    // Default values for ranking 
        public ?array $functions = null,    // Decay functions configuration 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
