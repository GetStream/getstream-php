<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ConfigVersionResponse extends BaseModel
{
    public function __construct(
        public ?int $version = null, // Sequential version number, per key and team
        public ?\DateTime $createdAt = null, // When this version was saved
        public ?string $createdBy = null, // ID of the user who saved this version, empty when saved without a user
        public ?bool $published = null, // Whether this is the version moderation currently runs
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
