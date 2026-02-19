<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdatePollRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?string $id = null, // Poll ID
        public ?string $name = null, // Poll name
        public ?string $description = null, // Poll description
        /** @var array<PollOptionRequest>|null */
        #[ArrayOf(PollOptionRequest::class)]
        public ?array $options = null, // Poll options
        public ?bool $enforceUniqueVote = null, // Enforce unique vote
        public ?string $votingVisibility = null, // Voting visibility
        public ?int $maxVotesAllowed = null, // Max votes allowed
        public ?bool $allowUserSuggestedOptions = null, // Allow user suggested options
        public ?bool $allowAnswers = null, // Allow answers
        public ?bool $isClosed = null, // Is closed
        public ?object $custom = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
