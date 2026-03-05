<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class QueryChannelsResponse extends BaseModel
{
    public function __construct(
        /** @var array<ChannelStateResponseFields>|null */
        #[ArrayOf(ChannelStateResponseFields::class)]
        public ?array $channels = null, // List of channels
        public ?ParsedPredefinedFilterResponse $predefinedFilter = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
