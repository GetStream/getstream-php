<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * The discriminator object for all webhook events, it maps events' payload to the final type
 */
class WebhookEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
