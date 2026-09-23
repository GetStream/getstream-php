<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Adds or updates manually set interest tags on a user. Tags already present are updated with the supplied weight; other tags on the user are left untouched. Manually set tags are never overwritten by the reaction-based computation. A user holds at most 50 interest tags in total.
 */
class UpsertUserInterestsRequest extends BaseModel
{
    public function __construct(
        /** @var array<UserInterestRequest>|null */
        #[ArrayOf(UserInterestRequest::class)]
        public ?array $interests = null, // Interest tags to add or update (1-50)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
