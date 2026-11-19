<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SaveConfigVersionResponse extends BaseModel
{
    public function __construct(
        public ?ConfigVersionResponse $version = null,
        public ?int $publishedVersion = null, // The version moderation currently runs
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
