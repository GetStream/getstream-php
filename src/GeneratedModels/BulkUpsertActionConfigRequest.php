<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BulkUpsertActionConfigRequest extends BaseModel
{
    public function __construct(
        /** @var array<UpsertActionConfigItem>|null */
        #[ArrayOf(UpsertActionConfigItem::class)]
        public ?array $actionConfigs = null, // List of action configs to create or update
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
