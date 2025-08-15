<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertPushTemplateRequest extends BaseModel
{
    public function __construct(
        public ?string $eventType = null,    // Event type (message.new, message.updated, reaction.new) 
        public ?string $pushProviderType = null,    // Push provider type (firebase, apn) 
        public ?bool $enablePush = null,    // Whether to send push notification for this event 
        public ?string $pushProviderName = null,    // Push provider name 
        public ?string $template = null,    // Push template 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
