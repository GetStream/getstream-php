<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallClosedCaption represents a closed caption of a call.
 *
 * @property \DateTime $endTime
 * @property string $id
 * @property string $language
 * @property string $speakerID
 * @property \DateTime $startTime
 * @property string $text
 * @property bool $translated
 * @property UserResponse $user
 * @property string|null $service
 */
class CallClosedCaption extends BaseModel
{
    public function __construct(
        public ?\DateTime $endTime = null,
        public ?string $id = null,
        public ?string $language = null,
        public ?string $speakerID = null,
        public ?\DateTime $startTime = null,
        public ?string $text = null,
        public ?bool $translated = null,
        public ?UserResponse $user = null,
        public ?string $service = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
