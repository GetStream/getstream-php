<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallRequest is the payload for creating a call.
 */
class CallRequest extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null,
        public ?string $createdByID = null,
        public ?\DateTime $startsAt = null,
        public ?string $team = null,
        public ?bool $video = null,
        public ?array $members = null,
        public ?UserRequest $createdBy = null,
        public ?object $custom = null,
        public ?CallSettingsRequest $settingsOverride = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
