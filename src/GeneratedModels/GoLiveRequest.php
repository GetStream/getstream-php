<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class GoLiveRequest extends BaseModel
{
    public function __construct(
        public ?string $recordingStorageName = null,
        public ?bool $startClosedCaption = null,
        public ?bool $startHLS = null,
        public ?bool $startRecording = null,
        public ?bool $startTranscription = null,
        public ?string $transcriptionStorageName = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
