<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SetHistoryWindowTeamsRequest extends BaseModel
{
    public function __construct(
        public ?array $teams = null, // Teams to give full history, 1 to 10, each listed once. Marking a team that already has full history keeps its created_at
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
