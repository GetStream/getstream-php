<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UploadChannelFileRequest extends BaseModel
{
    public function __construct(
        public ?OnlyUserID $user = null,
        public ?string $file = null, // file field
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
