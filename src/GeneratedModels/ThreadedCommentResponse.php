<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * A comment with an optional, depth‑limited slice of nested replies.
 */
class ThreadedCommentResponse implements JsonSerializable
{
    public function __construct(public ?int $confidenceScore = null,
        public ?\DateTime $createdAt = null,
        public ?int $downvoteCount = null,
        public ?string $id = null,
        public ?string $objectID = null,
        public ?string $objectType = null,
        public ?int $reactionCount = null,
        public ?int $replyCount = null,
        public ?int $score = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?int $upvoteCount = null,
        public ?array $mentionedUsers = null,
        public ?array $ownReactions = null,
        public ?UserResponse $user = null,
        public ?int $controversyScore = null,
        public ?\DateTime $deletedAt = null,
        public ?string $parentID = null,
        public ?string $text = null,
        public ?array $attachments = null,
        public ?array $latestReactions = null,
        public ?array $replies = null,
        public ?object $custom = null,
        public ?RepliesMeta $meta = null,
        public ?ModerationV2Response $moderation = null,
        public ?array $reactionGroups = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'confidence_score' => $this->confidenceScore,
            'created_at' => $this->createdAt,
            'downvote_count' => $this->downvoteCount,
            'id' => $this->id,
            'object_id' => $this->objectID,
            'object_type' => $this->objectType,
            'reaction_count' => $this->reactionCount,
            'reply_count' => $this->replyCount,
            'score' => $this->score,
            'status' => $this->status,
            'updated_at' => $this->updatedAt,
            'upvote_count' => $this->upvoteCount,
            'mentioned_users' => $this->mentionedUsers,
            'own_reactions' => $this->ownReactions,
            'user' => $this->user,
            'controversy_score' => $this->controversyScore,
            'deleted_at' => $this->deletedAt,
            'parent_id' => $this->parentID,
            'text' => $this->text,
            'attachments' => $this->attachments,
            'latest_reactions' => $this->latestReactions,
            'replies' => $this->replies,
            'custom' => $this->custom,
            'meta' => $this->meta,
            'moderation' => $this->moderation,
            'reaction_groups' => $this->reactionGroups,
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
        
        return new static(confidenceScore: $json['confidence_score'] ?? null,
            createdAt: $json['created_at'] ?? null,
            downvoteCount: $json['downvote_count'] ?? null,
            id: $json['id'] ?? null,
            objectID: $json['object_id'] ?? null,
            objectType: $json['object_type'] ?? null,
            reactionCount: $json['reaction_count'] ?? null,
            replyCount: $json['reply_count'] ?? null,
            score: $json['score'] ?? null,
            status: $json['status'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            upvoteCount: $json['upvote_count'] ?? null,
            mentionedUsers: $json['mentioned_users'] ?? null,
            ownReactions: $json['own_reactions'] ?? null,
            user: $json['user'] ?? null,
            controversyScore: $json['controversy_score'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            parentID: $json['parent_id'] ?? null,
            text: $json['text'] ?? null,
            attachments: $json['attachments'] ?? null,
            latestReactions: $json['latest_reactions'] ?? null,
            replies: $json['replies'] ?? null,
            custom: $json['custom'] ?? null,
            meta: $json['meta'] ?? null,
            moderation: $json['moderation'] ?? null,
            reactionGroups: $json['reaction_groups'] ?? null
        );
    }
} 
