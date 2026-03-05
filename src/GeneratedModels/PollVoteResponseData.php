<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PollVoteResponseData extends BaseModel
{
    public function __construct(
        public ?string $pollID = null,
        public ?string $id = null,
        public ?string $optionID = null,
        public ?bool $isAnswer = null,
        public ?string $answerText = null,
        public ?string $userID = null,
        public ?UserResponse $user = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
