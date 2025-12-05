<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $cid
 * @property string|null $id
 */
class DeliveredMessagePayload extends BaseModel
{
    public function __construct(
        public ?string $cid = null,
        public ?string $id = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
