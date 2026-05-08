<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkUpsertActionConfigResponse extends BaseModel
{
    public function __construct(
        /** @var array<ModerationActionConfigResponse>|null */
        #[ArrayOf(ModerationActionConfigResponse::class)]
        public ?array $actionConfigs = null, // The created or updated action configs in the same order as the request
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
