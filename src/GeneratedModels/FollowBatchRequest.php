<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FollowBatchRequest extends BaseModel
{
    public function __construct(
        /** @var array<FollowRequest>|null */
        #[ArrayOf(FollowRequest::class)]
        public ?array $follows = null, // List of follow relationships to create
        public ?bool $enrichOwnFields = null, // If true, enriches the follow's source_feed and target_feed with own_* fields (own_follows, own_followings, own_capabilities, own_membership). Defaults to false for performance.
        public ?bool $createUsers = null, // If true, auto-creates users referenced by source/target FIDs in the batch when they don't already exist. Server-side only. Defaults to false. This top-level field is the only supported batch/upsert create_users control.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
