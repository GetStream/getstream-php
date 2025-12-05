<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $source
 * @property string $target
 * @property string|null $followerRole
 */
class AcceptFollowRequest extends BaseModel
{
    public function __construct(
        public ?string $source = null, // Fully qualified ID of the source feed
        public ?string $target = null, // Fully qualified ID of the target feed
        public ?string $followerRole = null, // Optional role for the follower in the follow relationship
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
