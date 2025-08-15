<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * CallIngressResponse is the payload for ingress settings
 */
class CallIngressResponse extends BaseModel
{
    public function __construct(
        public ?RTMPIngress $rtmp = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
