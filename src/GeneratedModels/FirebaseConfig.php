<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FirebaseConfig extends BaseModel
{
    public function __construct(
        public ?bool $disabled = null,
        public ?string $serverKey = null,
        public ?string $notificationTemplate = null,
        public ?string $dataTemplate = null,
        public ?string $apnTemplate = null,
        public ?string $credentialsJson = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
