<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response from AI moderation
 */
class ModerationResponse extends BaseModel
{
    public function __construct(
        public ?float $toxic = null, // Toxicity score
        public ?float $explicit = null, // Explicit score
        public ?float $spam = null, // Spam score
        public ?string $action = null, // Action taken by automod
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
