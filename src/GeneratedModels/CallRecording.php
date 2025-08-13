<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallRecording represents a recording of a call.
 */
class CallRecording implements JsonSerializable
{
    public function __construct(public ?\DateTime $endTime = null,
        public ?string $filename = null,
        public ?string $sessionID = null,
        public ?\DateTime $startTime = null,
        public ?string $url = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'end_time' => $this->endTime,
            'filename' => $this->filename,
            'session_id' => $this->sessionID,
            'start_time' => $this->startTime,
            'url' => $this->url,
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
        
        return new static(endTime: $json['end_time'] ?? null,
            filename: $json['filename'] ?? null,
            sessionID: $json['session_id'] ?? null,
            startTime: $json['start_time'] ?? null,
            url: $json['url'] ?? null
        );
    }
} 
