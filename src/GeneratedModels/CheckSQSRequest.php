<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $sqsKey
 * @property string|null $sqsSecret
 * @property string|null $sqsUrl
 */
class CheckSQSRequest extends BaseModel
{
    public function __construct(
        public ?string $sqsKey = null, // AWS SQS access key
        public ?string $sqsSecret = null, // AWS SQS key secret
        public ?string $sqsUrl = null, // AWS SQS endpoint URL
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
