<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class GetCallReportResponse implements JsonSerializable
{
    public function __construct(public ?string $duration = null,
        public ?string $sessionID = null,
        public ?ReportResponse $report = null,
        public ?array $videoReactions = null,
        public ?ChatActivityStatsResponse $chatActivity = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'session_id' => $this->sessionID,
            'report' => $this->report,
            'video_reactions' => $this->videoReactions,
            'chat_activity' => $this->chatActivity,
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
        
        return new static(duration: $json['duration'] ?? null,
            sessionID: $json['session_id'] ?? null,
            report: $json['report'] ?? null,
            videoReactions: $json['video_reactions'] ?? null,
            chatActivity: $json['chat_activity'] ?? null
        );
    }
} 
