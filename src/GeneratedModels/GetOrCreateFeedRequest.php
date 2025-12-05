<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Client request
 *
 * @property string|null $idAround
 * @property int|null $limit
 * @property string|null $next
 * @property string|null $prev
 * @property string|null $userID
 * @property string|null $view
 * @property bool|null $watch
 * @property FeedInput|null $data
 * @property EnrichmentOptions|null $enrichmentOptions
 * @property object|null $externalRanking
 * @property object|null $filter
 * @property PagerRequest|null $followersPagination
 * @property PagerRequest|null $followingPagination
 * @property array|null $interestWeights
 * @property PagerRequest|null $memberPagination
 * @property UserRequest|null $user
 */
class GetOrCreateFeedRequest extends BaseModel
{
    public function __construct(
        public ?string $idAround = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?string $view = null,
        public ?bool $watch = null,
        public ?FeedInput $data = null,
        public ?EnrichmentOptions $enrichmentOptions = null,
        public ?object $externalRanking = null,
        public ?object $filter = null,
        public ?PagerRequest $followersPagination = null,
        public ?PagerRequest $followingPagination = null,
        public ?array $interestWeights = null,
        public ?PagerRequest $memberPagination = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
