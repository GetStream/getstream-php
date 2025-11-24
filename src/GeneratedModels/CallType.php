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
        public ?int $app = null,
        public ?\DateTime $createdAt = null,
        public ?int $id = null,
        public ?string $name = null,
        public ?string $recordingExternalStorage = null,
        public ?\DateTime $updatedAt = null,
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettings $settings = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
