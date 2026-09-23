<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The user's interest tags after the write, ordered by descending weight, then manually set tags before computed ones, then descending count, then ascending tag name
 */
class UpsertUserInterestsResponse extends BaseModel
{
    public function __construct(
        /** @var array<InterestTagResponse>|null */
        #[ArrayOf(InterestTagResponse::class)]
        public ?array $interests = null, // All interest tags of the user after the write
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
