<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PollResponseData extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $votingVisibility = null,
        public ?bool $enforceUniqueVote = null,
        public ?int $maxVotesAllowed = null,
        public ?bool $allowUserSuggestedOptions = null,
        public ?bool $allowAnswers = null,
        public ?bool $isClosed = null,
        public ?int $voteCount = null,
        /** @var array<PollOptionResponseData>|null */
        #[ArrayOf(PollOptionResponseData::class)]
        public ?array $options = null,
        public ?int $answersCount = null,
        public ?array $voteCountsByOption = null,
        public ?array $latestVotesByOption = null,
        /** @var array<PollVoteResponseData>|null */
        #[ArrayOf(PollVoteResponseData::class)]
        public ?array $latestAnswers = null,
        /** @var array<PollVoteResponseData>|null */
        #[ArrayOf(PollVoteResponseData::class)]
        public ?array $ownVotes = null,
        public ?string $createdByID = null,
        public ?UserResponse $createdBy = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
