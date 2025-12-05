<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $status
 * @property string|null $error
 */
class DeleteChannelsResultResponse extends BaseModel
{
    public function __construct(
        public ?string $status = null,
        public ?string $error = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
