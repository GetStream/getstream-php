<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $activityCount
 * @property \DateTime $createdAt
 * @property string $group
 * @property int $score
 * @property \DateTime $updatedAt
 * @property int $userCount
 * @property bool $userCountTruncated
 * @property array<ActivityResponse> $activities
 * @property bool|null $isWatched
 */
class AggregatedActivityResponse extends BaseModel
{
    public function __construct(
        public ?int $activityCount = null, // Number of activities in this aggregation
        public ?\DateTime $createdAt = null, // When the aggregation was created
        public ?string $group = null, // Grouping identifier
        public ?int $score = null, // Ranking score for this aggregation
        public ?\DateTime $updatedAt = null, // When the aggregation was last updated
        public ?int $userCount = null, // Number of unique users in this aggregation
        public ?bool $userCountTruncated = null, // Whether this activity group has been truncated due to exceeding the group size limit
        /** @var array<ActivityResponse>|null List of activities in this aggregation */
        #[ArrayOf(ActivityResponse::class)]
        public ?array $activities = null, // List of activities in this aggregation
        public ?bool $isWatched = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
