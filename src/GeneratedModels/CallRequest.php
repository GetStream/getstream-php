<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallRequest is the payload for creating a call.
 *
 * @property string|null $channelCid
 * @property string|null $createdByID
 * @property \DateTime|null $startsAt
 * @property string|null $team
 * @property bool|null $video
 * @property array<MemberRequest>|null $members
 * @property UserRequest|null $createdBy
 * @property object|null $custom
 * @property CallSettingsRequest|null $settingsOverride
 */
class CallRequest extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null,
        public ?string $createdByID = null,
        public ?\DateTime $startsAt = null,
        public ?string $team = null,
        public ?bool $video = null,
        /** @var array<MemberRequest>|null */
        #[ArrayOf(MemberRequest::class)]
        public ?array $members = null,
        public ?UserRequest $createdBy = null,
        public ?object $custom = null,
        public ?CallSettingsRequest $settingsOverride = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
