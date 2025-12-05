<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property string|null $file
 * @property string|null $moderationAction
 * @property string|null $thumbUrl
 */
class UploadChannelFileResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $file = null, // URL to the uploaded asset. Should be used to put to `asset_url` attachment field
        public ?string $moderationAction = null,
        public ?string $thumbUrl = null, // URL of the file thumbnail for supported file formats. Should be put to `thumb_url` attachment field
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
