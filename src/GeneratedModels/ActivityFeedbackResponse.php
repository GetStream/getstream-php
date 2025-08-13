<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Response for activity feedback submission
 */
class ActivityFeedbackResponse implements JsonSerializable
{
    public function __construct(public ?string $activityID = null,
        public ?string $duration = null,
        public ?bool $success = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'activity_id' => $this->activityID,
            'duration' => $this->duration,
            'success' => $this->success,
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
        
        return new static(activityID: $json['activity_id'] ?? null,
            duration: $json['duration'] ?? null,
            success: $json['success'] ?? null
        );
    }
} 
