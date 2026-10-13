<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetOrCreateFeedRequest extends BaseModel
{
    public function __construct(
        public ?FeedInput $data = null,
        public ?bool $watch = null,
        public ?string $view = null,
        public ?object $externalRanking = null,
        public ?array $interestWeights = null,
        public ?bool $overwriteInterestWeights = null,
        public ?object $filter = null,
        public ?PagerRequest $memberPagination = null,
        public ?PagerRequest $followersPagination = null,
        public ?PagerRequest $followingPagination = null,
        public ?EnrichmentOptions $enrichmentOptions = null, // Options to skip specific enrichments to improve performance. Default is false (enrichments are included). Setting a field to true skips that enrichment.
        public ?FriendReactionsOptions $friendReactionsOptions = null, // Options to control fetching reactions from friends (users you follow or have mutual follows with).
        public ?array $discardActors = null, // Feature-gated; not available for all apps. Request-scoped list of actor/user IDs whose activities are filtered from this GetOrCreateFeed response only. Merged (union) into the viewing user's in-memory blocked authors for this request; never persisted to blocked_users. Max: 1000.
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $idAround = null,
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
