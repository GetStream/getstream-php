<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ListChannelTypesResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, ChannelTypeConfig>|null */
        #[MapOf(ChannelTypeConfig::class)]
        public ?array $channelTypes = null, // Object with all channel types
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
