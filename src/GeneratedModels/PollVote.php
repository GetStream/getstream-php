<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PollVote implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $optionID = null,
        public ?string $pollID = null,
        public ?\DateTime $updatedAt = null,
        public ?string $answerText = null,
        public ?bool $isAnswer = null,
        public ?string $userID = null,
        public ?User $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'option_id' => $this->optionID,
            'poll_id' => $this->pollID,
            'updated_at' => $this->updatedAt,
            'answer_text' => $this->answerText,
            'is_answer' => $this->isAnswer,
            'user_id' => $this->userID,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            id: $json['id'] ?? null,
            optionID: $json['option_id'] ?? null,
            pollID: $json['poll_id'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            answerText: $json['answer_text'] ?? null,
            isAnswer: $json['is_answer'] ?? null,
            userID: $json['user_id'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
