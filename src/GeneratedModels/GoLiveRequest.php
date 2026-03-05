<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GoLiveRequest extends BaseModel
{
    public function __construct(
        public ?bool $startHLS = null,
        public ?bool $startRecording = null,
        public ?bool $startCompositeRecording = null,
        public ?bool $startIndividualRecording = null,
        public ?bool $startRawRecording = null,
        public ?string $recordingStorageName = null,
        public ?string $transcriptionStorageName = null,
        public ?bool $startTranscription = null,
        public ?bool $startClosedCaption = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
