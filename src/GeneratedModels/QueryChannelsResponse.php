<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ChannelStateResponseFields> $channels
 * @property ParsedPredefinedFilterResponse|null $predefinedFilter
 */
class QueryChannelsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<ChannelStateResponseFields>|null List of channels */
        #[ArrayOf(ChannelStateResponseFields::class)]
        public ?array $channels = null, // List of channels
        public ?ParsedPredefinedFilterResponse $predefinedFilter = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
