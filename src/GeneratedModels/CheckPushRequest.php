<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Check push request
 *
 * @property string|null $apnTemplate
 * @property string|null $eventType
 * @property string|null $firebaseDataTemplate
 * @property string|null $firebaseTemplate
 * @property string|null $messageID
 * @property string|null $pushProviderName
 * @property string|null $pushProviderType
 * @property bool|null $skipDevices
 * @property string|null $userID
 * @property UserRequest|null $user
 */
class CheckPushRequest extends BaseModel
{
    public function __construct(
        public ?string $apnTemplate = null, // Push message template for APN
        public ?string $eventType = null, // Type of event for push templates (default: message.new)
        public ?string $firebaseDataTemplate = null, // Push message data template for Firebase
        public ?string $firebaseTemplate = null, // Push message template for Firebase
        public ?string $messageID = null, // Message ID to send push notification for
        public ?string $pushProviderName = null, // Name of push provider
        public ?string $pushProviderType = null, // Push provider type
        public ?bool $skipDevices = null, // Don't require existing devices to render templates
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
