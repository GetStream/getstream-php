<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PollResponseData extends BaseModel
{
    public function __construct(
        public ?bool $allowAnswers = null,
        public ?bool $allowUserSuggestedOptions = null,
        public ?int $answersCount = null,
        public ?\DateTime $createdAt = null,
        public ?string $createdByID = null,
        public ?string $description = null,
        public ?bool $enforceUniqueVote = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?\DateTime $updatedAt = null,
        public ?int $voteCount = null,
        public ?string $votingVisibility = null,
        public ?array $latestAnswers = null,
        public ?array $options = null,
        public ?array $ownVotes = null,
        public ?object $custom = null,
        public ?array $latestVotesByOption = null,
        public ?array $voteCountsByOption = null,
        public ?bool $isClosed = null,
        public ?int $maxVotesAllowed = null,
        public ?UserResponse $createdBy = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
