<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelInput extends BaseModel
{
    public function __construct(
        public ?ChannelConfig $configOverrides = null,
        public ?UserRequest $createdBy = null,
        public ?string $team = null, // Team the channel belongs to (if multi-tenant mode is enabled)
        public ?bool $autoTranslationEnabled = null, // Enable or disable auto translation
        public ?string $autoTranslationLanguage = null, // Switch auto translation language
        public ?string $createdByID = null,
        public ?string $truncatedByID = null,
        public ?bool $frozen = null, // Freeze or unfreeze the channel
        public ?bool $disabled = null,
        public ?object $custom = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $invites = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $members = null,
        public ?array $filterTags = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
