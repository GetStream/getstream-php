<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelInputRequest extends BaseModel
{
    public function __construct(
        public ?bool $autoTranslationEnabled = null,
        public ?string $autoTranslationLanguage = null,
        public ?bool $disabled = null,
        public ?bool $frozen = null,
        public ?string $team = null,
        public ?array $invites = null,
        public ?array $members = null,
        public ?ConfigOverrides $configOverrides = null,
        public ?User $createdBy = null,
        public ?object $custom = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
