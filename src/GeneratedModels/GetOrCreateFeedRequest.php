<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Client request
 */
class GetOrCreateFeedRequest extends BaseModel
{
    public function __construct(
        public ?FeedInput $data = null,
        public ?EnrichmentOptions $enrichmentOptions = null,
        public ?PagerRequest $followersPagination = null,
        public ?PagerRequest $followingPagination = null,
        public ?FriendReactionsOptions $friendReactionsOptions = null,
        public ?PagerRequest $memberPagination = null,
        public ?UserRequest $user = null,
        public ?bool $watch = null,
        public ?string $view = null,
        public ?object $externalRanking = null,
        public ?array $interestWeights = null,
        public ?object $filter = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $idAround = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
