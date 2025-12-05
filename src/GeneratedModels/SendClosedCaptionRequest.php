<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $speakerID
 * @property string $text
 * @property \DateTime|null $endTime
 * @property string|null $language
 * @property string|null $service
 * @property \DateTime|null $startTime
 * @property bool|null $translated
 * @property string|null $userID
 * @property UserRequest|null $user
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
