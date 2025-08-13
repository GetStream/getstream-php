<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GoLiveRequest implements JsonSerializable
{
    public function __construct(public ?string $recordingStorageName = null,
        public ?bool $startClosedCaption = null,
        public ?bool $startHLS = null,
        public ?bool $startRecording = null,
        public ?bool $startTranscription = null,
        public ?string $transcriptionStorageName = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'recording_storage_name' => $this->recordingStorageName,
            'start_closed_caption' => $this->startClosedCaption,
            'start_hls' => $this->startHLS,
            'start_recording' => $this->startRecording,
            'start_transcription' => $this->startTranscription,
            'transcription_storage_name' => $this->transcriptionStorageName,
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
        
        return new static(recordingStorageName: $json['recording_storage_name'] ?? null,
            startClosedCaption: $json['start_closed_caption'] ?? null,
            startHLS: $json['start_hls'] ?? null,
            startRecording: $json['start_recording'] ?? null,
            startTranscription: $json['start_transcription'] ?? null,
            transcriptionStorageName: $json['transcription_storage_name'] ?? null
        );
    }
} 
