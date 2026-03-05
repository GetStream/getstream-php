<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelInputRequest extends BaseModel
{
    public function __construct(
        public ?string $team = null,
        public ?bool $autoTranslationEnabled = null,
        public ?string $autoTranslationLanguage = null,
        public ?bool $frozen = null,
        public ?bool $disabled = null,
        public ?object $custom = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $invites = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $members = null,
        public ?ConfigOverridesRequest $configOverrides = null,
        public ?UserRequest $createdBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
