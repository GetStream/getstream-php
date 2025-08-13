<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ActivityResponse implements JsonSerializable
{
    public function __construct(public ?int $bookmarkCount = null,
        public ?int $commentCount = null,
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?int $popularity = null,
        public ?int $reactionCount = null,
        public ?int $score = null,
        public ?int $shareCount = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?string $visibility = null,
        public ?array $attachments = null,
        public ?array $comments = null,
        public ?array $feeds = null,
        public ?array $filterTags = null,
        public ?array $interestTags = null,
        public ?array $latestReactions = null,
        public ?array $mentionedUsers = null,
        public ?array $ownBookmarks = null,
        public ?array $ownReactions = null,
        public ?object $custom = null,
        public ?array $reactionGroups = null,
        public ?object $searchData = null,
        public ?UserResponse $user = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $editedAt = null,
        public ?\DateTime $expiresAt = null,
        public ?bool $hidden = null,
        public ?string $text = null,
        public ?string $visibilityTag = null,
        public ?FeedResponse $currentFeed = null,
        public ?ActivityLocation $location = null,
        public ?ModerationV2Response $moderation = null,
        public ?object $notificationContext = null,
        public ?ActivityResponse $parent = null,
        public ?PollResponseData $poll = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'bookmark_count' => $this->bookmarkCount,
            'comment_count' => $this->commentCount,
            'created_at' => $this->createdAt,
            'id' => $this->id,
            'popularity' => $this->popularity,
            'reaction_count' => $this->reactionCount,
            'score' => $this->score,
            'share_count' => $this->shareCount,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'visibility' => $this->visibility,
            'attachments' => $this->attachments,
            'comments' => $this->comments,
            'feeds' => $this->feeds,
            'filter_tags' => $this->filterTags,
            'interest_tags' => $this->interestTags,
            'latest_reactions' => $this->latestReactions,
            'mentioned_users' => $this->mentionedUsers,
            'own_bookmarks' => $this->ownBookmarks,
            'own_reactions' => $this->ownReactions,
            'custom' => $this->custom,
            'reaction_groups' => $this->reactionGroups,
            'search_data' => $this->searchData,
            'user' => $this->user,
            'deleted_at' => $this->deletedAt,
            'edited_at' => $this->editedAt,
            'expires_at' => $this->expiresAt,
            'hidden' => $this->hidden,
            'text' => $this->text,
            'visibility_tag' => $this->visibilityTag,
            'current_feed' => $this->currentFeed,
            'location' => $this->location,
            'moderation' => $this->moderation,
            'notification_context' => $this->notificationContext,
            'parent' => $this->parent,
            'poll' => $this->poll,
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
        
        return new static(bookmarkCount: $json['bookmark_count'] ?? null,
            commentCount: $json['comment_count'] ?? null,
            createdAt: $json['created_at'] ?? null,
            id: $json['id'] ?? null,
            popularity: $json['popularity'] ?? null,
            reactionCount: $json['reaction_count'] ?? null,
            score: $json['score'] ?? null,
            shareCount: $json['share_count'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            visibility: $json['visibility'] ?? null,
            attachments: $json['attachments'] ?? null,
            comments: $json['comments'] ?? null,
            feeds: $json['feeds'] ?? null,
            filterTags: $json['filter_tags'] ?? null,
            interestTags: $json['interest_tags'] ?? null,
            latestReactions: $json['latest_reactions'] ?? null,
            mentionedUsers: $json['mentioned_users'] ?? null,
            ownBookmarks: $json['own_bookmarks'] ?? null,
            ownReactions: $json['own_reactions'] ?? null,
            custom: $json['custom'] ?? null,
            reactionGroups: $json['reaction_groups'] ?? null,
            searchData: $json['search_data'] ?? null,
            user: $json['user'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            editedAt: $json['edited_at'] ?? null,
            expiresAt: $json['expires_at'] ?? null,
            hidden: $json['hidden'] ?? null,
            text: $json['text'] ?? null,
            visibilityTag: $json['visibility_tag'] ?? null,
            currentFeed: $json['current_feed'] ?? null,
            location: $json['location'] ?? null,
            moderation: $json['moderation'] ?? null,
            notificationContext: $json['notification_context'] ?? null,
            parent: $json['parent'] ?? null,
            poll: $json['poll'] ?? null
        );
    }
} 
