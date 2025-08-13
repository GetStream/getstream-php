<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallSettingsRequest implements JsonSerializable
{
    public function __construct(public ?AudioSettingsRequest $audio = null,
        public ?BackstageSettingsRequest $backstage = null,
        public ?BroadcastSettingsRequest $broadcasting = null,
        public ?FrameRecordingSettingsRequest $frameRecording = null,
        public ?GeofenceSettingsRequest $geofencing = null,
        public ?IngressSettingsRequest $ingress = null,
        public ?LimitsSettingsRequest $limits = null,
        public ?RecordSettingsRequest $recording = null,
        public ?RingSettingsRequest $ring = null,
        public ?ScreensharingSettingsRequest $screensharing = null,
        public ?SessionSettingsRequest $session = null,
        public ?ThumbnailsSettingsRequest $thumbnails = null,
        public ?TranscriptionSettingsRequest $transcription = null,
        public ?VideoSettingsRequest $video = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'audio' => $this->audio,
            'backstage' => $this->backstage,
            'broadcasting' => $this->broadcasting,
            'frame_recording' => $this->frameRecording,
            'geofencing' => $this->geofencing,
            'ingress' => $this->ingress,
            'limits' => $this->limits,
            'recording' => $this->recording,
            'ring' => $this->ring,
            'screensharing' => $this->screensharing,
            'session' => $this->session,
            'thumbnails' => $this->thumbnails,
            'transcription' => $this->transcription,
            'video' => $this->video,
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
        
        return new static(audio: $json['audio'] ?? null,
            backstage: $json['backstage'] ?? null,
            broadcasting: $json['broadcasting'] ?? null,
            frameRecording: $json['frame_recording'] ?? null,
            geofencing: $json['geofencing'] ?? null,
            ingress: $json['ingress'] ?? null,
            limits: $json['limits'] ?? null,
            recording: $json['recording'] ?? null,
            ring: $json['ring'] ?? null,
            screensharing: $json['screensharing'] ?? null,
            session: $json['session'] ?? null,
            thumbnails: $json['thumbnails'] ?? null,
            transcription: $json['transcription'] ?? null,
            video: $json['video'] ?? null
        );
    }
} 
