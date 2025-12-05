<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $action
 * @property int|null $banDuration
 * @property string|null $cascadingAction
 * @property int|null $cascadingThreshold
 * @property bool|null $checkMessageContext
 * @property int|null $fastSpamThreshold
 * @property int|null $fastSpamTtl
 * @property bool|null $ipBan
 * @property int|null $probationPeriod
 * @property bool|null $shadowBan
 * @property int|null $slowSpamBanDuration
 * @property int|null $slowSpamThreshold
 * @property int|null $slowSpamTtl
 * @property bool|null $urlOnly
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
