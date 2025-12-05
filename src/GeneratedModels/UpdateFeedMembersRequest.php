<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $operation
 * @property int|null $limit
 * @property string|null $next
 * @property string|null $prev
 * @property array<FeedMemberRequest>|null $members
 */
class UpdateFeedMembersRequest extends BaseModel
{
    public function __construct(
        public ?string $operation = null, // Type of update operation to perform
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        /** @var array<FeedMemberRequest>|null List of members to upsert, remove, or set */
        #[ArrayOf(FeedMemberRequest::class)]
        public ?array $members = null, // List of members to upsert, remove, or set
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
