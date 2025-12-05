<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Config for creating Amazon S3 storage.
 *
 * @property string $s3Region
 * @property string|null $s3APIKey
 * @property string|null $s3CustomEndpointUrl
 * @property string|null $s3Secret
 */
class S3Request extends BaseModel
{
    public function __construct(
        public ?string $s3Region = null, // The AWS region where the bucket is hosted
        public ?string $s3APIKey = null, // The AWS API key. To use Amazon S3 as your storage provider, you have two authentication options: IAM role or API key. If you do not specify the `s3_api_key` parameter, Stream will use IAM role authentication. In that case make sure to have the correct IAM role configured for your application.
        public ?string $s3CustomEndpointUrl = null, // The custom endpoint for S3. If you want to use a custom endpoint, you must also provide the `s3_api_key` and `s3_secret` parameters.
        public ?string $s3Secret = null, // The AWS API Secret
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
