<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $userID
 * @property UserRequest|null $user
 * @property VoteData|null $vote
 */
class CastPollVoteRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?UserRequest $user = null,
        public ?VoteData $vote = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
