<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EgressTaskConfig implements JsonSerializable
{
    public function __construct(public ?EgressUser $egressUser = null,
        public ?FrameRecordingEgressConfig $frameRecordingEgressConfig = null,
        public ?HLSEgressConfig $hlsEgressConfig = null,
        public ?RecordingEgressConfig $recordingEgressConfig = null,
        public ?RTMPEgressConfig $rtmpEgressConfig = null,
        public ?STTEgressConfig $sttEgressConfig = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'egress_user' => $this->egressUser,
            'frame_recording_egress_config' => $this->frameRecordingEgressConfig,
            'hls_egress_config' => $this->hlsEgressConfig,
            'recording_egress_config' => $this->recordingEgressConfig,
            'rtmp_egress_config' => $this->rtmpEgressConfig,
            'stt_egress_config' => $this->sttEgressConfig,
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
        
        return new static(egressUser: $json['egress_user'] ?? null,
            frameRecordingEgressConfig: $json['frame_recording_egress_config'] ?? null,
            hlsEgressConfig: $json['hls_egress_config'] ?? null,
            recordingEgressConfig: $json['recording_egress_config'] ?? null,
            rtmpEgressConfig: $json['rtmp_egress_config'] ?? null,
            sttEgressConfig: $json['stt_egress_config'] ?? null
        );
    }
} 
