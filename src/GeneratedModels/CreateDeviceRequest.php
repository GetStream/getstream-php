<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Create device request
 */
class CreateDeviceRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Device ID
        public ?string $pushProvider = null, // Push provider
        public ?string $pushProviderName = null, // Push provider name
        public ?bool $voipToken = null, // When true the token is for Apple VoIP push notifications
        public ?string $hardwareID = null, // Stable physical device identifier used to deduplicate pushes across push providers (e.g. APNs VoIP and Firebase on the same iOS device). Distinct from 'id', which is the push token.
        public ?string $userID = null, // **Server-side only**. User ID which server acts upon
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
