<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $snsKey
 * @property string|null $snsSecret
 * @property string|null $snsTopicArn
 */
class CheckSNSRequest extends BaseModel
{
    public function __construct(
        public ?string $snsKey = null, // AWS SNS access key
        public ?string $snsSecret = null, // AWS SNS key secret
        public ?string $snsTopicArn = null, // AWS SNS topic ARN
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
