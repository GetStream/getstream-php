<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $autoTranslationEnabled
 * @property string|null $autoTranslationLanguage
 * @property bool|null $disabled
 * @property bool|null $frozen
 * @property string|null $team
 * @property array<ChannelMember>|null $invites
 * @property array<ChannelMember>|null $members
 * @property ConfigOverrides|null $configOverrides
 * @property User|null $createdBy
 * @property object|null $custom
 */
class ChannelInputRequest extends BaseModel
{
    public function __construct(
        public ?bool $autoTranslationEnabled = null,
        public ?string $autoTranslationLanguage = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null,
        public ?string $team = null,
        /** @var array<ChannelMember>|null */
        #[ArrayOf(ChannelMember::class)]
        public ?array $invites = null,
        /** @var array<ChannelMember>|null */
        #[ArrayOf(ChannelMember::class)]
        public ?array $members = null,
        public ?ConfigOverrides $configOverrides = null,
        public ?User $createdBy = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
