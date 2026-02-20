<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Contains all information needed to create a new poll
 */
class CreatePollRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null, // The name of the poll
        public ?string $description = null, // A description of the poll
        /** @var array<PollOptionInput>|null */
        #[ArrayOf(PollOptionInput::class)]
        public ?array $options = null,
        public ?string $votingVisibility = null,
        public ?bool $enforceUniqueVote = null, // Indicates whether users can cast multiple votes
        public ?int $maxVotesAllowed = null, // Indicates the maximum amount of votes a user can cast
        public ?bool $allowUserSuggestedOptions = null,
        public ?bool $allowAnswers = null, // Indicates whether users can suggest user defined answers
        public ?bool $isClosed = null, // Indicates whether the poll is open for voting
        public ?object $custom = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
