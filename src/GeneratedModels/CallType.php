<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallType extends BaseModel
{
    public function __construct(
        public ?NotificationSettings $notificationSettings = null,
        public ?CallSettings $settings = null,
        public ?int $id = null,
        public ?int $app = null,
        public ?string $name = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?string $recordingExternalStorage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
