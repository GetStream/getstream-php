<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Client request
 */
class GetOrCreateFeedRequest implements JsonSerializable
{
    public function __construct(public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?string $userID = null,
        public ?string $view = null,
        public ?bool $watch = null,
        public ?object $activitySelectorOptions = null,
        public ?FeedInput $data = null,
        public ?object $externalRanking = null,
        public ?object $filter = null,
        public ?PagerRequest $followersPagination = null,
        public ?PagerRequest $followingPagination = null,
        public ?array $interestWeights = null,
        public ?PagerRequest $memberPagination = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'limit' => $this->limit,
            'next' => $this->next,
            'prev' => $this->prev,
            'user_id' => $this->userID,
            'view' => $this->view,
            'watch' => $this->watch,
            'activity_selector_options' => $this->activitySelectorOptions,
            'data' => $this->data,
            'external_ranking' => $this->externalRanking,
            'filter' => $this->filter,
            'followers_pagination' => $this->followersPagination,
            'following_pagination' => $this->followingPagination,
            'interest_weights' => $this->interestWeights,
            'member_pagination' => $this->memberPagination,
            'user' => $this->user,
        ], fn($v) => $v !== null);
    }

    public function toArray(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * Create a new instance from JSON data.
     *
     * @param array<string, mixed>|string $json JSON data
     * @return static
     */
    public static function fromJson($json): self
    {
        if (is_string($json)) {
            $json = json_decode($json, true);
        }
        
        return new static(limit: $json['limit'] ?? null,
            next: $json['next'] ?? null,
            prev: $json['prev'] ?? null,
            userID: $json['user_id'] ?? null,
            view: $json['view'] ?? null,
            watch: $json['watch'] ?? null,
            activitySelectorOptions: $json['activity_selector_options'] ?? null,
            data: $json['data'] ?? null,
            externalRanking: $json['external_ranking'] ?? null,
            filter: $json['filter'] ?? null,
            followersPagination: $json['followers_pagination'] ?? null,
            followingPagination: $json['following_pagination'] ?? null,
            interestWeights: $json['interest_weights'] ?? null,
            memberPagination: $json['member_pagination'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
