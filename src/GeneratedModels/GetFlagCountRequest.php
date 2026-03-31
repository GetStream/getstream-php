<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetFlagCountRequest extends BaseModel
{
    public function __construct(
        public ?string $entityCreatorID = null, // ID of the user whose content was flagged
        public ?string $entityType = null, // Optional entity type filter (e.g., stream:chat:v1:message, stream:user)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
