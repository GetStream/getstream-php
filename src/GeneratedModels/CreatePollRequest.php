<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Contains all information needed to create a new poll
 */
class CreatePollRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null,    // The name of the poll 
        public ?bool $allowAnswers = null,    // Indicates whether users can suggest user defined answers 
        public ?bool $allowUserSuggestedOptions = null,
        public ?string $description = null,    // A description of the poll 
        public ?bool $enforceUniqueVote = null,    // Indicates whether users can cast multiple votes 
        public ?string $id = null,
        public ?bool $isClosed = null,    // Indicates whether the poll is open for voting 
        public ?int $maxVotesAllowed = null,    // Indicates the maximum amount of votes a user can cast 
        public ?string $userID = null,
        public ?string $votingVisibility = null,
        public ?array $options = null,
        public ?object $custom = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
