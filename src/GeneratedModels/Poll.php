<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $allowAnswers
 * @property bool $allowUserSuggestedOptions
 * @property int $answersCount
 * @property \DateTime $createdAt
 * @property string $createdByID
 * @property string $description
 * @property bool $enforceUniqueVote
 * @property string $id
 * @property string $name
 * @property \DateTime $updatedAt
 * @property int $voteCount
 * @property array<PollVote> $latestAnswers
 * @property array<PollOption> $options
 * @property array<PollVote> $ownVotes
 * @property object $custom
 * @property array $latestVotesByOption
 * @property array $voteCountsByOption
 * @property bool|null $isClosed
 * @property int|null $maxVotesAllowed
 * @property string|null $votingVisibility
 * @property User|null $createdBy
 */
class Poll extends BaseModel
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
        /** @var array<PollVote>|null */
        #[ArrayOf(PollVote::class)]
        public ?array $latestAnswers = null,
        /** @var array<PollOption>|null */
        #[ArrayOf(PollOption::class)]
        public ?array $options = null,
        /** @var array<PollVote>|null */
        #[ArrayOf(PollVote::class)]
        public ?array $ownVotes = null,
        public ?object $custom = null,
        public ?array $latestVotesByOption = null,
        public ?array $voteCountsByOption = null,
        public ?bool $isClosed = null,
        public ?int $maxVotesAllowed = null,
        public ?string $votingVisibility = null,
        public ?User $createdBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
