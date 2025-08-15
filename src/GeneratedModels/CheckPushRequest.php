<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Check push request
 */
class CheckPushRequest extends BaseModel
{
    public function __construct(
        public ?string $apnTemplate = null,    // Push message template for APN 
        public ?string $eventType = null,    // Type of event for push templates (default: message.new) 
        public ?string $firebaseDataTemplate = null,    // Push message data template for Firebase 
        public ?string $firebaseTemplate = null,    // Push message template for Firebase 
        public ?string $messageID = null,    // Message ID to send push notification for 
        public ?string $pushProviderName = null,    // Name of push provider 
        public ?string $pushProviderType = null,    // Push provider type 
        public ?bool $skipDevices = null,    // Don't require existing devices to render templates 
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
