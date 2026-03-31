<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Options to skip specific enrichments to improve performance. Default is false (enrichments are included). Setting a field to true skips that enrichment.
 */
class EnrichmentOptions extends BaseModel
{
    public function __construct(
        public ?bool $skipActivity = null, // Default: false. When true, skips all activity enrichments.
        public ?bool $skipActivityParents = null, // Default: false. When true, skips enriching parent activities.
        public ?bool $skipActivityReactions = null, // Default: false. When true, skips fetching and enriching latest and own reactions on activities. Note: If reactions are already denormalized in the database, they will still be included.
        public ?bool $skipActivityOwnBookmarks = null, // Default: false. When true, skips enriching own bookmarks on activities.
        public ?bool $skipActivityComments = null, // Default: false. When true, skips enriching comments on activities.
        public ?bool $skipActivityMentionedUsers = null, // Default: false. When true, skips enriching mentioned users on activities.
        public ?bool $skipActivityPoll = null, // Default: false. When true, skips enriching poll data on activities.
        public ?bool $skipActivityCollections = null, // Default: false. When true, skips enriching collections on activities.
        public ?bool $skipActivityRefreshImageUrls = null, // Default: false. When true, skips refreshing image URLs on activities.
        public ?bool $skipActivityCurrentFeed = null, // Default: false. When true, skips enriching current_feed on activities. Note: CurrentFeed is still computed for permission checks, but enrichment is skipped.
        public ?bool $skipPins = null, // Default: false. When true, skips enriching pinned activities.
        public ?bool $skipFeedMemberUser = null, // Default: false. When true, skips enriching user data on feed members.
        public ?bool $skipFollowers = null, // Default: false. When true, skips fetching and enriching followers. Note: If followers_pagination is explicitly provided, followers will be fetched regardless of this setting.
        public ?bool $skipFollowing = null, // Default: false. When true, skips fetching and enriching following. Note: If following_pagination is explicitly provided, following will be fetched regardless of this setting.
        public ?bool $skipOwnFollows = null, // Default: false. When true, skips fetching and enriching own_follows (follows where user's feeds follow target feeds).
        public ?bool $enrichOwnFollowings = null, // Default: false. When true, includes fetching and enriching own_followings (follows where activity author's feeds follow current user's feeds).
        public ?bool $skipOwnCapabilities = null, // Default: false. When true, skips computing and including capabilities for feeds.
        public ?bool $skipAll = null, // Default: false. When true, skips all enrichments.
        public ?bool $includeScoreVars = null, // Default: false. When true, includes score_vars in activity responses containing variable values used at ranking time.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
