<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class WebhookFailoverConfig extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?string $gcsBucket = null,
        public ?string $gcsPath = null,
        public ?string $gcsCredentials = null,
        public ?string $s3Bucket = null,
        public ?string $s3Path = null,
        public ?string $s3Region = null,
        public ?string $s3APIKey = null,
        public ?string $s3Secret = null,
        public ?string $s3RoleArn = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
