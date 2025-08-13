<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SubmitActionRequest implements JsonSerializable
{
    public function __construct(public ?string $actionType = null,
        public ?string $itemID = null,
        public ?string $userID = null,
        public ?BanActionRequest $ban = null,
        public ?CustomActionRequest $custom = null,
        public ?DeleteActivityRequest $deleteActivity = null,
        public ?DeleteMessageRequest $deleteMessage = null,
        public ?DeleteReactionRequest $deleteReaction = null,
        public ?DeleteUserRequest $deleteUser = null,
        public ?MarkReviewedRequest $markReviewed = null,
        public ?UnbanActionRequest $unban = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'action_type' => $this->actionType,
            'item_id' => $this->itemID,
            'user_id' => $this->userID,
            'ban' => $this->ban,
            'custom' => $this->custom,
            'delete_activity' => $this->deleteActivity,
            'delete_message' => $this->deleteMessage,
            'delete_reaction' => $this->deleteReaction,
            'delete_user' => $this->deleteUser,
            'mark_reviewed' => $this->markReviewed,
            'unban' => $this->unban,
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
        
        return new static(actionType: $json['action_type'] ?? null,
            itemID: $json['item_id'] ?? null,
            userID: $json['user_id'] ?? null,
            ban: $json['ban'] ?? null,
            custom: $json['custom'] ?? null,
            deleteActivity: $json['delete_activity'] ?? null,
            deleteMessage: $json['delete_message'] ?? null,
            deleteReaction: $json['delete_reaction'] ?? null,
            deleteUser: $json['delete_user'] ?? null,
            markReviewed: $json['mark_reviewed'] ?? null,
            unban: $json['unban'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
