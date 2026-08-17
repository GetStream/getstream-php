<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelInput extends BaseModel
{
    public function __construct(
        public ?string $team = null, // Team the channel belongs to (if multi-tenant mode is enabled)
        public ?bool $autoTranslationEnabled = null, // Enable or disable auto translation
        public ?string $autoTranslationLanguage = null, // Language (or comma-separated list of languages) to translate to when auto translation is active
        public ?string $createdByID = null,
        public ?UserRequest $createdBy = null, // User request object
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
        public ?ChannelConfigOverrides $configOverrides = null, // Channel configuration overrides
        public ?array $filterTags = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
