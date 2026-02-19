<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Create device request
 */
class CreateDeviceRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?string $id = null, // Device ID
        public ?string $pushProvider = null, // Push provider
        public ?string $pushProviderName = null, // Push provider name
        public ?bool $voipToken = null, // When true the token is for Apple VoIP push notifications
        public ?string $userID = null, // **Server-side only**. User ID which server acts upon
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
