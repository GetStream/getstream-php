<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpdateActivityRequest implements JsonSerializable
{
    public function __construct(public ?\DateTime $expiresAt = null,
        public ?string $pollID = null,
        public ?string $text = null,
        public ?string $userID = null,
        public ?string $visibility = null,
        public ?array $attachments = null,
        public ?array $filterTags = null,
        public ?array $interestTags = null,
        public ?object $custom = null,
        public ?ActivityLocation $location = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'expires_at' => $this->expiresAt,
            'poll_id' => $this->pollID,
            'text' => $this->text,
            'user_id' => $this->userID,
            'visibility' => $this->visibility,
            'attachments' => $this->attachments,
            'filter_tags' => $this->filterTags,
            'interest_tags' => $this->interestTags,
            'custom' => $this->custom,
            'location' => $this->location,
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
        
        return new static(expiresAt: $json['expires_at'] ?? null,
            pollID: $json['poll_id'] ?? null,
            text: $json['text'] ?? null,
            userID: $json['user_id'] ?? null,
            visibility: $json['visibility'] ?? null,
            attachments: $json['attachments'] ?? null,
            filterTags: $json['filter_tags'] ?? null,
            interestTags: $json['interest_tags'] ?? null,
            custom: $json['custom'] ?? null,
            location: $json['location'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
