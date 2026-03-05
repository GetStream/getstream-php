<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallClosedCaption represents a closed caption of a call.
 */
class CallClosedCaption extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $text = null,
        public ?\DateTime $startTime = null,
        public ?\DateTime $endTime = null,
        public ?string $speakerID = null,
        public ?UserResponse $user = null,
        public ?string $language = null,
        public ?string $service = null,
        public ?bool $translated = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
