<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallSettingsResponse implements JsonSerializable
{
    public function __construct(public ?AudioSettingsResponse $audio = null,
        public ?BackstageSettingsResponse $backstage = null,
        public ?BroadcastSettingsResponse $broadcasting = null,
        public ?FrameRecordingSettingsResponse $frameRecording = null,
        public ?GeofenceSettingsResponse $geofencing = null,
        public ?LimitsSettingsResponse $limits = null,
        public ?RecordSettingsResponse $recording = null,
        public ?RingSettingsResponse $ring = null,
        public ?ScreensharingSettingsResponse $screensharing = null,
        public ?SessionSettingsResponse $session = null,
        public ?ThumbnailsSettingsResponse $thumbnails = null,
        public ?TranscriptionSettingsResponse $transcription = null,
        public ?VideoSettingsResponse $video = null,
        public ?IngressSettingsResponse $ingress = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'audio' => $this->audio,
            'backstage' => $this->backstage,
            'broadcasting' => $this->broadcasting,
            'frame_recording' => $this->frameRecording,
            'geofencing' => $this->geofencing,
            'limits' => $this->limits,
            'recording' => $this->recording,
            'ring' => $this->ring,
            'screensharing' => $this->screensharing,
            'session' => $this->session,
            'thumbnails' => $this->thumbnails,
            'transcription' => $this->transcription,
            'video' => $this->video,
            'ingress' => $this->ingress,
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
            limits: $json['limits'] ?? null,
            recording: $json['recording'] ?? null,
            ring: $json['ring'] ?? null,
            screensharing: $json['screensharing'] ?? null,
            session: $json['session'] ?? null,
            thumbnails: $json['thumbnails'] ?? null,
            transcription: $json['transcription'] ?? null,
            video: $json['video'] ?? null,
            ingress: $json['ingress'] ?? null
        );
    }
} 
