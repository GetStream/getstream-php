<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CheckSQSRequest extends BaseModel
{
    public function __construct(
        public ?string $sqsUrl = null, // AWS SQS endpoint URL
        public ?string $sqsKey = null, // AWS SQS access key
        public ?string $sqsSecret = null, // AWS SQS key secret
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
