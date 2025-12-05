<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property bool|null $allowAnswers
 * @property bool|null $allowUserSuggestedOptions
 * @property string|null $description
 * @property bool|null $enforceUniqueVote
 * @property bool|null $isClosed
 * @property int|null $maxVotesAllowed
 * @property string|null $userID
 * @property string|null $votingVisibility
 * @property array<PollOptionRequest>|null $options
 * @property object|null $custom
 * @property UserRequest|null $user
 */
class UpdatePollRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Poll ID
        public ?string $name = null, // Poll name
        public ?bool $allowAnswers = null, // Allow answers
        public ?bool $allowUserSuggestedOptions = null, // Allow user suggested options
        public ?string $description = null, // Poll description
        public ?bool $enforceUniqueVote = null, // Enforce unique vote
        public ?bool $isClosed = null, // Is closed
        public ?int $maxVotesAllowed = null, // Max votes allowed
        public ?string $userID = null,
        public ?string $votingVisibility = null, // Voting visibility
        /** @var array<PollOptionRequest>|null Poll options */
        #[ArrayOf(PollOptionRequest::class)]
        public ?array $options = null, // Poll options
        public ?object $custom = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
