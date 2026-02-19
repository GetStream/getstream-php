<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class VelocityFilterConfigRule extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?int $banDuration = null,
        public ?bool $shadowBan = null,
        public ?bool $ipBan = null,
        public ?int $cascadingThreshold = null,
        public ?string $cascadingAction = null,
        public ?int $fastSpamThreshold = null,
        public ?int $slowSpamThreshold = null,
        public ?bool $checkMessageContext = null,
        public ?int $fastSpamTtl = null,
        public ?int $slowSpamTtl = null,
        public ?int $slowSpamBanDuration = null,
        public ?bool $urlOnly = null,
        public ?int $probationPeriod = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
