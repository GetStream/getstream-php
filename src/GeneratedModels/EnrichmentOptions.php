<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $skipActivity
 * @property bool|null $skipActivityCollections
 * @property bool|null $skipActivityComments
 * @property bool|null $skipActivityCurrentFeed
 * @property bool|null $skipActivityMentionedUsers
 * @property bool|null $skipActivityOwnBookmarks
 * @property bool|null $skipActivityParents
 * @property bool|null $skipActivityPoll
 * @property bool|null $skipActivityReactions
 * @property bool|null $skipActivityRefreshImageUrls
 * @property bool|null $skipAll
 * @property bool|null $skipFeedMemberUser
 * @property bool|null $skipFollowers
 * @property bool|null $skipFollowing
 * @property bool|null $skipOwnCapabilities
 * @property bool|null $skipOwnFollows
 * @property bool|null $skipPins
 */
class EnrichmentOptions extends BaseModel
{
    public function __construct(
        public ?bool $skipActivity = null,
        public ?bool $skipActivityCollections = null,
        public ?bool $skipActivityComments = null,
        public ?bool $skipActivityCurrentFeed = null,
        public ?bool $skipActivityMentionedUsers = null,
        public ?bool $skipActivityOwnBookmarks = null,
        public ?bool $skipActivityParents = null,
        public ?bool $skipActivityPoll = null,
        public ?bool $skipActivityReactions = null,
        public ?bool $skipActivityRefreshImageUrls = null,
        public ?bool $skipAll = null,
        public ?bool $skipFeedMemberUser = null,
        public ?bool $skipFollowers = null,
        public ?bool $skipFollowing = null,
        public ?bool $skipOwnCapabilities = null,
        public ?bool $skipOwnFollows = null,
        public ?bool $skipPins = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
