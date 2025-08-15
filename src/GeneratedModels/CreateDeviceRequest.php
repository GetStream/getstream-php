<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Create device request
 */
class CreateDeviceRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,    // Device ID 
        public ?string $pushProvider = null,    // Push provider 
        public ?string $pushProviderName = null,    // Push provider name 
        public ?string $userID = null,    // **Server-side only**. User ID which server acts upon 
        public ?bool $voipToken = null,    // When true the token is for Apple VoIP push notifications 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
