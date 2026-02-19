<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CampaignChannelTemplate extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $id = null,
        public ?array $members = null,
        /** @var array<CampaignChannelMember>|null */
        #[ArrayOf(CampaignChannelMember::class)]
        public ?array $membersTemplate = null,
        public ?string $team = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
