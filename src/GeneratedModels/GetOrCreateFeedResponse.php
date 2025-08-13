<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class GetOrCreateFeedResponse implements JsonSerializable
{
    public function __construct(public ?bool $created = null,
        public ?string $duration = null,
        public ?array $activities = null,
        public ?array $aggregatedActivities = null,
        public ?array $followers = null,
        public ?array $following = null,
        public ?array $members = null,
        public ?array $ownCapabilities = null,
        public ?array $pinnedActivities = null,
        public ?FeedResponse $feed = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?array $ownFollows = null,
        public ?PagerResponse $followersPagination = null,
        public ?PagerResponse $followingPagination = null,
        public ?PagerResponse $memberPagination = null,
        public ?NotificationStatusResponse $notificationStatus = null,
        public ?FeedMemberResponse $ownMembership = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created' => $this->created,
            'duration' => $this->duration,
            'activities' => $this->activities,
            'aggregated_activities' => $this->aggregatedActivities,
            'followers' => $this->followers,
            'following' => $this->following,
            'members' => $this->members,
            'own_capabilities' => $this->ownCapabilities,
            'pinned_activities' => $this->pinnedActivities,
            'feed' => $this->feed,
            'next' => $this->next,
            'prev' => $this->prev,
            'own_follows' => $this->ownFollows,
            'followers_pagination' => $this->followersPagination,
            'following_pagination' => $this->followingPagination,
            'member_pagination' => $this->memberPagination,
            'notification_status' => $this->notificationStatus,
            'own_membership' => $this->ownMembership,
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
        
        return new static(created: $json['created'] ?? null,
            duration: $json['duration'] ?? null,
            activities: $json['activities'] ?? null,
            aggregatedActivities: $json['aggregated_activities'] ?? null,
            followers: $json['followers'] ?? null,
            following: $json['following'] ?? null,
            members: $json['members'] ?? null,
            ownCapabilities: $json['own_capabilities'] ?? null,
            pinnedActivities: $json['pinned_activities'] ?? null,
            feed: $json['feed'] ?? null,
            next: $json['next'] ?? null,
            prev: $json['prev'] ?? null,
            ownFollows: $json['own_follows'] ?? null,
            followersPagination: $json['followers_pagination'] ?? null,
            followingPagination: $json['following_pagination'] ?? null,
            memberPagination: $json['member_pagination'] ?? null,
            notificationStatus: $json['notification_status'] ?? null,
            ownMembership: $json['own_membership'] ?? null
        );
    }
} 
