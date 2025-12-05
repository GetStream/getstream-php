<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property FeedMemberResponse $member
 */
class AcceptFeedMemberInviteResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?FeedMemberResponse $member = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
