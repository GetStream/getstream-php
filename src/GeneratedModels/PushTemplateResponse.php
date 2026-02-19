<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PushTemplateResponse extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Time when the template was created
        public ?bool $enablePush = null, // Whether push notification is enabled for this event
        public ?string $eventType = null, // Type of event this template applies to
        public ?string $pushProviderInternalID = null, // Internal ID of the push provider
        public ?\DateTime $updatedAt = null, // Time when the template was last updated
        public ?string $template = null, // The push notification template
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
