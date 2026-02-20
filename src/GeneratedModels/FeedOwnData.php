<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedOwnData extends BaseModel
{
    public function __construct(
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $ownFollows = null, // Follow relationships where the current user's feeds are following this feed
        /** @var array<FollowResponse>|null */
        #[ArrayOf(FollowResponse::class)]
        public ?array $ownFollowings = null, // Follow relationships where the feed owner's feeds are following the current user's feeds (up to 5 total)
        /** @var array<FeedOwnCapability>|null */
        #[ArrayOf(FeedOwnCapability::class)]
        public ?array $ownCapabilities = null, // Capabilities the current user has for this feed
        public ?FeedMemberResponse $ownMembership = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
