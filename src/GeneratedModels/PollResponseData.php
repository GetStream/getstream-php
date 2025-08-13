<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PollResponseData implements JsonSerializable
{
    public function __construct(public ?bool $allowAnswers = null,
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
        public ?UserResponse $createdBy = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'allow_answers' => $this->allowAnswers,
            'allow_user_suggested_options' => $this->allowUserSuggestedOptions,
            'answers_count' => $this->answersCount,
            'created_at' => $this->createdAt,
            'created_by_id' => $this->createdByID,
            'description' => $this->description,
            'enforce_unique_vote' => $this->enforceUniqueVote,
            'id' => $this->id,
            'name' => $this->name,
            'updated_at' => $this->updatedAt,
            'vote_count' => $this->voteCount,
            'voting_visibility' => $this->votingVisibility,
            'latest_answers' => $this->latestAnswers,
            'options' => $this->options,
            'own_votes' => $this->ownVotes,
            'custom' => $this->custom,
            'latest_votes_by_option' => $this->latestVotesByOption,
            'vote_counts_by_option' => $this->voteCountsByOption,
            'is_closed' => $this->isClosed,
            'max_votes_allowed' => $this->maxVotesAllowed,
            'created_by' => $this->createdBy,
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
        
        return new static(allowAnswers: $json['allow_answers'] ?? null,
            allowUserSuggestedOptions: $json['allow_user_suggested_options'] ?? null,
            answersCount: $json['answers_count'] ?? null,
            createdAt: $json['created_at'] ?? null,
            createdByID: $json['created_by_id'] ?? null,
            description: $json['description'] ?? null,
            enforceUniqueVote: $json['enforce_unique_vote'] ?? null,
            id: $json['id'] ?? null,
            name: $json['name'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            voteCount: $json['vote_count'] ?? null,
            votingVisibility: $json['voting_visibility'] ?? null,
            latestAnswers: $json['latest_answers'] ?? null,
            options: $json['options'] ?? null,
            ownVotes: $json['own_votes'] ?? null,
            custom: $json['custom'] ?? null,
            latestVotesByOption: $json['latest_votes_by_option'] ?? null,
            voteCountsByOption: $json['vote_counts_by_option'] ?? null,
            isClosed: $json['is_closed'] ?? null,
            maxVotesAllowed: $json['max_votes_allowed'] ?? null,
            createdBy: $json['created_by'] ?? null
        );
    }
} 
