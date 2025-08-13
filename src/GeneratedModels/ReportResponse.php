<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ReportResponse implements JsonSerializable
{
    public function __construct(public ?CallReportResponse $call = null,
        public ?ParticipantReportResponse $participants = null,
        public ?UserRatingReportResponse $userRatings = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'call' => $this->call,
            'participants' => $this->participants,
            'user_ratings' => $this->userRatings,
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
        
        return new static(call: $json['call'] ?? null,
            participants: $json['participants'] ?? null,
            userRatings: $json['user_ratings'] ?? null
        );
    }
} 
