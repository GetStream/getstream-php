<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallRequest is the payload for creating a call.
 */
class CallRequest extends BaseModel
{
    public function __construct(
        public ?string $team = null,
        public ?UserRequest $createdBy = null,
        public ?string $createdByID = null,
        public ?object $custom = null,
        /** @var array<MemberRequest>|null */
        #[ArrayOf(MemberRequest::class)]
        public ?array $members = null,
        public ?CallSettingsRequest $settingsOverride = null,
        public ?\DateTime $startsAt = null,
        public ?bool $video = null,
        public ?string $channelCid = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
