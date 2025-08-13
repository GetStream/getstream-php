<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EgressResponse implements JsonSerializable
{
    public function __construct(public ?bool $broadcasting = null,
        public ?array $rtmps = null,
        public ?FrameRecordingResponse $frameRecording = null,
        public ?EgressHLSResponse $hls = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'broadcasting' => $this->broadcasting,
            'rtmps' => $this->rtmps,
            'frame_recording' => $this->frameRecording,
            'hls' => $this->hls,
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
        
        return new static(broadcasting: $json['broadcasting'] ?? null,
            rtmps: $json['rtmps'] ?? null,
            frameRecording: $json['frame_recording'] ?? null,
            hls: $json['hls'] ?? null
        );
    }
} 
