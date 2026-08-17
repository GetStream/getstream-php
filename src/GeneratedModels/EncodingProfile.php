<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EncodingProfile extends BaseModel
{
    public function __construct(
        public ?string $sourceFile = null,
        public ?int $getstatsSnapshots = null,
        public ?string $codec = null,
        public ?string $encoderImpl = null,
        public ?bool $hardwareEncode = null,
        public ?bool $powerEfficient = null,
        public ?string $ladderType = null,
        public ?array $svcModes = null,
        public ?int $simulcastLayers = null,
        public ?string $resolution = null,
        public ?int $fpsP50 = null,
        public ?int $fpsP10 = null,
        public ?int $avgSendKbps = null,
        public ?array $qualityLimitationSamples = null,
        public ?array $qualityLimitationDurationsS = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
