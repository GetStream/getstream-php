<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SendClosedCaptionRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?UserRequest $user = null,
        public ?string $text = null,
        public ?string $speakerID = null,
        public ?\DateTime $startTime = null,
        public ?\DateTime $endTime = null,
        public ?string $service = null,
        public ?string $language = null,
        public ?bool $translated = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
