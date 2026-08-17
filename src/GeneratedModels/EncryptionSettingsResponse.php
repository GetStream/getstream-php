<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * EncryptionSettings is the payload for end-to-end encryption settings
 */
class EncryptionSettingsResponse extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // the resolved encryption mode for the call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
