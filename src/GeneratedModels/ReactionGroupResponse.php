<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * ReactionGroupResponse contains all information about a reaction of the same type.
 */
class ReactionGroupResponse implements JsonSerializable
{
    public function __construct(public ?int $count = null,
        public ?\DateTime $firstReactionAt = null,
        public ?\DateTime $lastReactionAt = null,
        public ?int $sumScores = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'count' => $this->count,
            'first_reaction_at' => $this->firstReactionAt,
            'last_reaction_at' => $this->lastReactionAt,
            'sum_scores' => $this->sumScores,
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
        
        return new static(count: $json['count'] ?? null,
            firstReactionAt: $json['first_reaction_at'] ?? null,
            lastReactionAt: $json['last_reaction_at'] ?? null,
            sumScores: $json['sum_scores'] ?? null
        );
    }
} 
