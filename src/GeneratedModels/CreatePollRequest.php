<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Contains all information needed to create a new poll
 */
class CreatePollRequest implements JsonSerializable
{
    public function __construct(public ?string $name = null,
        public ?bool $allowAnswers = null,
        public ?bool $allowUserSuggestedOptions = null,
        public ?string $description = null,
        public ?bool $enforceUniqueVote = null,
        public ?string $id = null,
        public ?bool $isClosed = null,
        public ?int $maxVotesAllowed = null,
        public ?string $userID = null,
        public ?string $votingVisibility = null,
        public ?array $options = null,
        public ?object $custom = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'name' => $this->name,
            'allow_answers' => $this->allowAnswers,
            'allow_user_suggested_options' => $this->allowUserSuggestedOptions,
            'description' => $this->description,
            'enforce_unique_vote' => $this->enforceUniqueVote,
            'id' => $this->id,
            'is_closed' => $this->isClosed,
            'max_votes_allowed' => $this->maxVotesAllowed,
            'user_id' => $this->userID,
            'voting_visibility' => $this->votingVisibility,
            'options' => $this->options,
            'Custom' => $this->custom,
            'user' => $this->user,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(name: $json['name'] ?? null,
            allowAnswers: $json['allow_answers'] ?? null,
            allowUserSuggestedOptions: $json['allow_user_suggested_options'] ?? null,
            description: $json['description'] ?? null,
            enforceUniqueVote: $json['enforce_unique_vote'] ?? null,
            id: $json['id'] ?? null,
            isClosed: $json['is_closed'] ?? null,
            maxVotesAllowed: $json['max_votes_allowed'] ?? null,
            userID: $json['user_id'] ?? null,
            votingVisibility: $json['voting_visibility'] ?? null,
            options: $json['options'] ?? null,
            custom: $json['Custom'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
