<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetActionConfigResponse extends BaseModel
{
    public function __construct(
        public ?array $actionConfig = null, // Moderation action configs grouped by entity type, sorted by order ascending
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
