<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $id
 * @property string $optionID
 * @property string $pollID
 * @property \DateTime $updatedAt
 * @property string|null $answerText
 * @property bool|null $isAnswer
 * @property string|null $userID
 * @property UserResponse|null $user
 */
class PollVoteResponseData extends BaseModel
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
        public ?UserResponse $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
