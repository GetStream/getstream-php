<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertActionConfigResponse extends BaseModel
{
    public function __construct(
        public ?ModerationActionConfigResponse $actionConfig = null, // Configuration for a moderation action
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
