<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallClosedCaption represents a closed caption of a call.
 */
class CallClosedCaption implements JsonSerializable
{
    public function __construct(public ?\DateTime $endTime = null,
        public ?string $speakerID = null,
        public ?\DateTime $startTime = null,
        public ?string $text = null,
        public ?UserResponse $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'end_time' => $this->endTime,
            'speaker_id' => $this->speakerID,
            'start_time' => $this->startTime,
            'text' => $this->text,
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
        
        return new static(endTime: $json['end_time'] ?? null,
            speakerID: $json['speaker_id'] ?? null,
            startTime: $json['start_time'] ?? null,
            text: $json['text'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
