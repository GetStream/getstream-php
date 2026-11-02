<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RankingConfig extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of ranking algorithm. Required. One of: expression, interest
        public ?string $score = null, // Scoring formula. Required when type is 'expression' (unless for_you.preset is set) or 'interest'
        public ?object $defaults = null, // Default values for ranking
        /** @var array<string, DecayFunctionConfig>|null */
        #[MapOf(DecayFunctionConfig::class)]
        public ?array $functions = null, // Decay functions configuration
        public ?float $excludeBelow = null, // Activities scoring strictly below this value are dropped from the ranked feed. Not supported on aggregated feeds
        public ?ArrangeConfig $arrange = null,
        public ?ForYouConfig $forYou = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
