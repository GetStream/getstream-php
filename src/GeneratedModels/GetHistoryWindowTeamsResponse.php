<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetHistoryWindowTeamsResponse extends BaseModel
{
    public function __construct(
        public ?int $defaultWindowHours = null, // History window, in hours, of every team without full history; 0 is full history
        /** @var array<HistoryWindowTeam>|null */
        #[ArrayOf(HistoryWindowTeam::class)]
        public ?array $teams = null, // Teams with full history
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
