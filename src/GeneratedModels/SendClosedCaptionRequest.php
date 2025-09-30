<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SendClosedCaptionRequest extends BaseModel
{
    public function __construct(
        public ?string $speakerID = null,
        public ?string $text = null,
        public ?\DateTime $endTime = null,
        public ?string $language = null,
        public ?string $service = null,
        public ?\DateTime $startTime = null,
        public ?bool $translated = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
