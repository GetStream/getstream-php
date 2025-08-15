<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class FirebaseConfig extends BaseModel
{
    public function __construct(
        public ?string $apnTemplate = null,
        public ?string $credentialsJson = null,
        public ?string $dataTemplate = null,
        public ?bool $disabled = null,
        public ?string $notificationTemplate = null,
        public ?string $serverKey = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
