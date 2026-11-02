<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteHistoryWindowTeamsRequest extends BaseModel
{
    public function __construct(
        public ?array $teams = null, // Teams to put back on the app's default history window, 1 to 10, each listed once. A team without full history is ignored
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
