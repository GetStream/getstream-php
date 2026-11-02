<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SetHistoryWindowTeamsResponse extends BaseModel
{
    public function __construct(
        /** @var array<HistoryWindowTeam>|null */
        #[ArrayOf(HistoryWindowTeam::class)]
        public ?array $teams = null, // The teams of the request, each with full history
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
