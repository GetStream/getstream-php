<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<FeedOwnCapability>|null $ownCapabilities
 * @property array<FollowResponse>|null $ownFollows
 * @property FeedMemberResponse|null $ownMembership
 */
class FeedOwnData extends BaseModel
{
    public function __construct(
        /** @var array<FeedOwnCapability>|null Capabilities the current user has for this feed */
        #[ArrayOf(FeedOwnCapability::class)]
        public ?array $ownCapabilities = null, // Capabilities the current user has for this feed
        /** @var array<FollowResponse>|null Follow relationships where the current user's feeds are following this feed */
        #[ArrayOf(FollowResponse::class)]
        public ?array $ownFollows = null, // Follow relationships where the current user's feeds are following this feed
        public ?FeedMemberResponse $ownMembership = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
