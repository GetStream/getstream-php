<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FollowBatchResponse extends BaseModel
{
    public function __construct(
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $follows = null, // List of current follow relationships
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $created = null, // List of newly created follow relationships
        public ?string $taskID = null, // ID of the background task when the request was sent with async: true
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
