<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallStatsReportSummaryResponse implements JsonSerializable
{
    public function __construct(public ?string $callCid = null,
        public ?int $callDurationSeconds = null,
        public ?string $callSessionID = null,
        public ?string $callStatus = null,
        public ?\DateTime $firstStatsTime = null,
        public ?\DateTime $createdAt = null,
        public ?int $minUserRating = null,
        public ?int $qualityScore = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call_cid' => $this->callCid,
            'call_duration_seconds' => $this->callDurationSeconds,
            'call_session_id' => $this->callSessionID,
            'call_status' => $this->callStatus,
            'first_stats_time' => $this->firstStatsTime,
            'created_at' => $this->createdAt,
            'min_user_rating' => $this->minUserRating,
            'quality_score' => $this->qualityScore,
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
        
        return new static(callCid: $json['call_cid'] ?? null,
            callDurationSeconds: $json['call_duration_seconds'] ?? null,
            callSessionID: $json['call_session_id'] ?? null,
            callStatus: $json['call_status'] ?? null,
            firstStatsTime: $json['first_stats_time'] ?? null,
            createdAt: $json['created_at'] ?? null,
            minUserRating: $json['min_user_rating'] ?? null,
            qualityScore: $json['quality_score'] ?? null
        );
    }
} 
