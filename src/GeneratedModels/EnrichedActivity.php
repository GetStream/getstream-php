<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EnrichedActivity implements JsonSerializable
{
    public function __construct(public ?string $foreignID = null,
        public ?string $id = null,
        public ?int $score = null,
        public ?string $verb = null,
        public ?array $to = null,
        public ?Data $actor = null,
        public ?array $latestReactions = null,
        public ?Data $object = null,
        public ?Data $origin = null,
        public ?array $ownReactions = null,
        public ?array $reactionCounts = null,
        public ?Data $target = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'foreign_id' => $this->foreignID,
            'id' => $this->id,
            'score' => $this->score,
            'verb' => $this->verb,
            'to' => $this->to,
            'actor' => $this->actor,
            'latest_reactions' => $this->latestReactions,
            'object' => $this->object,
            'origin' => $this->origin,
            'own_reactions' => $this->ownReactions,
            'reaction_counts' => $this->reactionCounts,
            'target' => $this->target,
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
        
        return new static(foreignID: $json['foreign_id'] ?? null,
            id: $json['id'] ?? null,
            score: $json['score'] ?? null,
            verb: $json['verb'] ?? null,
            to: $json['to'] ?? null,
            actor: $json['actor'] ?? null,
            latestReactions: $json['latest_reactions'] ?? null,
            object: $json['object'] ?? null,
            origin: $json['origin'] ?? null,
            ownReactions: $json['own_reactions'] ?? null,
            reactionCounts: $json['reaction_counts'] ?? null,
            target: $json['target'] ?? null
        );
    }
} 
