<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class ListChannelTypesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ChannelTypeConfig>|null */
        #[ArrayOf(ChannelTypeConfig::class)]
        public ?array $channelTypes = null, // Object with all channel types
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
