<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Request limit defaults applied by the server when the corresponding field is omitted.
 */
class AppDefaults extends BaseModel
{
    public function __construct(
        public ?QueryChannelsDefaults $queryChannels = null, // Defaults applied by the query channels endpoint.
        public ?GetOrCreateChannelDefaults $getOrCreateChannel = null, // Defaults applied by the get-or-create channel endpoint.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
