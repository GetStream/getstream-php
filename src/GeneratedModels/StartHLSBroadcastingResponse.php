<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * StartHLSBroadcastingResponse is the payload for starting an HLS broadcasting.
 *
 * @property string $duration
 * @property string $playlistUrl
 */
class StartHLSBroadcastingResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?string $playlistUrl = null, // the URL of the HLS playlist
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
