<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PollVote extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $optionID = null,
        public ?string $pollID = null,
        public ?\DateTime $updatedAt = null,
        public ?string $answerText = null,
        public ?bool $isAnswer = null,
        public ?string $userID = null,
        public ?User $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
