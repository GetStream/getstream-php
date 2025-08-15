<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DeleteChannelsRequest extends BaseModel
{
    public function __construct(
        public ?array $cids = null,    // All channels that should be deleted 
        public ?bool $hardDelete = null,    // Specify if channels and all ressources should be hard deleted 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
