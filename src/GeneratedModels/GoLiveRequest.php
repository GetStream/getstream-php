<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $recordingStorageName
 * @property bool|null $startClosedCaption
 * @property bool|null $startCompositeRecording
 * @property bool|null $startHLS
 * @property bool|null $startIndividualRecording
 * @property bool|null $startRawRecording
 * @property bool|null $startRecording
 * @property bool|null $startTranscription
 * @property string|null $transcriptionStorageName
 */
class GoLiveRequest extends BaseModel
{
    public function __construct(
        public ?string $recordingStorageName = null,
        public ?bool $startClosedCaption = null,
        public ?bool $startCompositeRecording = null,
        public ?bool $startHLS = null,
        public ?bool $startIndividualRecording = null,
        public ?bool $startRawRecording = null,
        public ?bool $startRecording = null,
        public ?bool $startTranscription = null,
        public ?string $transcriptionStorageName = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
