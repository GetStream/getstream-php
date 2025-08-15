<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class UpsertPushPreferencesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?array $userChannelPreferences = null,    // The channel specific push notification preferences, only returned for channels you've edited. 
        public ?array $userPreferences = null,    // The user preferences, always returned regardless if you edited it 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
