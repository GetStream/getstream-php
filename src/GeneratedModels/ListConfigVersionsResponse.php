<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ListConfigVersionsResponse extends BaseModel
{
    public function __construct(
        public ?int $publishedVersion = null, // The version moderation currently runs
        /** @var array<ConfigVersionResponse>|null */
        #[ArrayOf(ConfigVersionResponse::class)]
        public ?array $versions = null, // Retained versions of this configuration, newest first, including the published one
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
