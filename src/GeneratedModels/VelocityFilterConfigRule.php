<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class VelocityFilterConfigRule extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?int $banDuration = null,
        public ?string $cascadingAction = null,
        public ?int $cascadingThreshold = null,
        public ?bool $checkMessageContext = null,
        public ?int $fastSpamThreshold = null,
        public ?int $fastSpamTtl = null,
        public ?bool $ipBan = null,
        public ?int $probationPeriod = null,
        public ?bool $shadowBan = null,
        public ?int $slowSpamBanDuration = null,
        public ?int $slowSpamThreshold = null,
        public ?int $slowSpamTtl = null,
        public ?bool $urlOnly = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
