<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdatePollRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Poll ID 
        public ?string $name = null,    // Poll name 
        public ?bool $allowAnswers = null,    // Allow answers 
        public ?bool $allowUserSuggestedOptions = null,    // Allow user suggested options 
        public ?string $description = null,    // Poll description 
        public ?bool $enforceUniqueVote = null,    // Enforce unique vote 
        public ?bool $isClosed = null,    // Is closed 
        public ?int $maxVotesAllowed = null,    // Max votes allowed 
        public ?string $userID = null,
        public ?string $votingVisibility = null,    // Voting visibility 
        public ?array $options = null,    // Poll options 
        public ?object $custom = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
