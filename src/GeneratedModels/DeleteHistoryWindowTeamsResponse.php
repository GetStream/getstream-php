<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteHistoryWindowTeamsResponse extends BaseModel
{
    public function __construct(
        public ?array $teams = null, // The teams of the request that had full history and are now back on the default window
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
