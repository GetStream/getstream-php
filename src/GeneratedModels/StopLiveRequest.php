<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class StopLiveRequest implements JsonSerializable
{
    public function __construct(public ?bool $continueClosedCaption = null,
        public ?bool $continueHLS = null,
        public ?bool $continueRTMPBroadcasts = null,
        public ?bool $continueRecording = null,
        public ?bool $continueTranscription = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'continue_closed_caption' => $this->continueClosedCaption,
            'continue_hls' => $this->continueHLS,
            'continue_rtmp_broadcasts' => $this->continueRTMPBroadcasts,
            'continue_recording' => $this->continueRecording,
            'continue_transcription' => $this->continueTranscription,
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
        
        return new static(continueClosedCaption: $json['continue_closed_caption'] ?? null,
            continueHLS: $json['continue_hls'] ?? null,
            continueRTMPBroadcasts: $json['continue_rtmp_broadcasts'] ?? null,
            continueRecording: $json['continue_recording'] ?? null,
            continueTranscription: $json['continue_transcription'] ?? null
        );
    }
} 
