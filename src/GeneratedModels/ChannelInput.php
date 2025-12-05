<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $autoTranslationEnabled
 * @property string|null $autoTranslationLanguage
 * @property string|null $createdByID
 * @property bool|null $disabled
 * @property bool|null $frozen
 * @property string|null $team
 * @property string|null $truncatedByID
 * @property array|null $filterTags
 * @property array<ChannelMemberRequest>|null $invites
 * @property array<ChannelMemberRequest>|null $members
 * @property ChannelConfig|null $configOverrides
 * @property UserRequest|null $createdBy
 * @property object|null $custom
 */
class ChannelInput extends BaseModel
{
    public function __construct(
        public ?bool $autoTranslationEnabled = null, // Enable or disable auto translation
        public ?string $autoTranslationLanguage = null, // Switch auto translation language
        public ?string $createdByID = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null, // Freeze or unfreeze the channel
        public ?string $team = null, // Team the channel belongs to (if multi-tenant mode is enabled)
        public ?string $truncatedByID = null,
        public ?array $filterTags = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $invites = null,
        /** @var array<ChannelMemberRequest>|null */
        #[ArrayOf(ChannelMemberRequest::class)]
        public ?array $members = null,
        public ?ChannelConfig $configOverrides = null,
        public ?UserRequest $createdBy = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
