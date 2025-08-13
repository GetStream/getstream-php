<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SegmentTargetResponse implements JsonSerializable
{
    public function __construct(public ?int $appPk = null,
        public ?\DateTime $createdAt = null,
        public ?string $segmentID = null,
        public ?string $targetID = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'app_pk' => $this->appPk,
            'created_at' => $this->createdAt,
            'segment_id' => $this->segmentID,
            'target_id' => $this->targetID,
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
        
        return new static(appPk: $json['app_pk'] ?? null,
            createdAt: $json['created_at'] ?? null,
            segmentID: $json['segment_id'] ?? null,
            targetID: $json['target_id'] ?? null
        );
    }
} 
