<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A team with full history
 */
class HistoryWindowTeam extends BaseModel
{
    public function __construct(
        public ?string $team = null, // The team, as set on channels and users
        public ?\DateTime $createdAt = null, // Date/time the team was first given full history
        public ?\DateTime $updatedAt = null, // Date/time the team was last marked
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
