<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CastPollVoteRequest implements JsonSerializable
{
    public function __construct(public ?string $userID = null,
        public ?UserRequest $user = null,
        public ?VoteData $vote = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'user_id' => $this->userID,
            'user' => $this->user,
            'vote' => $this->vote,
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
        
        return new static(userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null,
            vote: $json['vote'] ?? null
        );
    }
} 
