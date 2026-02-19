<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallActionOptions extends BaseModel
{
    public function __construct(
        public ?int $duration = null,
        public ?string $flagReason = null,
        public ?string $kickReason = null,
        public ?bool $muteAudio = null,
        public ?bool $muteVideo = null,
        public ?string $reason = null,
        public ?string $warningText = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
