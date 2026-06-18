<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * User's computed interest tags ordered by descending count, then ascending tag name
 */
class GetUserInterestsResponse extends BaseModel
{
    public function __construct(
        /** @var array<InterestTagResponse>|null */
        #[ArrayOf(InterestTagResponse::class)]
        public ?array $interests = null, // Top-N interest tags sorted by descending count, then alphabetically by tag
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
