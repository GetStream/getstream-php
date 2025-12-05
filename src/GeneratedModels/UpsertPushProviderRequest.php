<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property PushProvider|null $pushProvider
 */
class UpsertPushProviderRequest extends BaseModel
{
    public function __construct(
        public ?PushProvider $pushProvider = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
