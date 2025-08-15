<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallType extends BaseModel
{
    public function __construct(
        public ?int $appPK = null,
        public ?\DateTime $createdAt = null,
        public ?string $externalStorage = null,
        public ?string $name = null,
        public ?int $pK = null,
        public ?\DateTime $updatedAt = null,
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettings $settings = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
