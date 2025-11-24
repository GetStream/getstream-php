<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Client request
 */
class GetOrCreateFeedRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?string $view = null,
        public ?bool $watch = null,
        public ?FeedInput $data = null,
        public ?object $externalRanking = null,
        public ?object $filter = null,
        public ?PagerRequest $followersPagination = null,
        public ?PagerRequest $followingPagination = null,
        public ?array $interestWeights = null,
        public ?PagerRequest $memberPagination = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
