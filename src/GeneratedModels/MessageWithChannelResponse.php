<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Represents any chat message
 */
class MessageWithChannelResponse implements JsonSerializable
{
    public function __construct(public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?int $deletedReplyCount = null,
        public ?string $html = null,
        public ?string $id = null,
        public ?bool $pinned = null,
        public ?int $replyCount = null,
        public ?bool $shadowed = null,
        public ?bool $silent = null,
        public ?string $text = null,
        public ?string $type = null,
        public ?\DateTime $updatedAt = null,
        public ?array $attachments = null,
        public ?array $latestReactions = null,
        public ?array $mentionedUsers = null,
        public ?array $ownReactions = null,
        public ?array $restrictedVisibility = null,
        public ?ChannelResponse $channel = null,
        public ?object $custom = null,
        public ?array $reactionCounts = null,
        public ?array $reactionScores = null,
        public ?UserResponse $user = null,
        public ?string $command = null,
        public ?\DateTime $deletedAt = null,
        public ?\DateTime $messageTextUpdatedAt = null,
        public ?string $mml = null,
        public ?string $parentID = null,
        public ?\DateTime $pinExpires = null,
        public ?\DateTime $pinnedAt = null,
        public ?string $pollID = null,
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null,
        public ?array $threadParticipants = null,
        public ?DraftResponse $draft = null,
        public ?array $i18n = null,
        public ?array $imageLabels = null,
        public ?ModerationV2Response $moderation = null,
        public ?UserResponse $pinnedBy = null,
        public ?PollResponseData $poll = null,
        public ?MessageResponse $quotedMessage = null,
        public ?array $reactionGroups = null,
        public ?ReminderResponseData $reminder = null,
        public ?SharedLocationResponseData $sharedLocation = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'cid' => $this->cid,
            'created_at' => $this->createdAt,
            'deleted_reply_count' => $this->deletedReplyCount,
            'html' => $this->html,
            'id' => $this->id,
            'pinned' => $this->pinned,
            'reply_count' => $this->replyCount,
            'shadowed' => $this->shadowed,
            'silent' => $this->silent,
            'text' => $this->text,
            'type' => $this->type,
            'updated_at' => $this->updatedAt,
            'attachments' => $this->attachments,
            'latest_reactions' => $this->latestReactions,
            'mentioned_users' => $this->mentionedUsers,
            'own_reactions' => $this->ownReactions,
            'restricted_visibility' => $this->restrictedVisibility,
            'channel' => $this->channel,
            'custom' => $this->custom,
            'reaction_counts' => $this->reactionCounts,
            'reaction_scores' => $this->reactionScores,
            'user' => $this->user,
            'command' => $this->command,
            'deleted_at' => $this->deletedAt,
            'message_text_updated_at' => $this->messageTextUpdatedAt,
            'mml' => $this->mml,
            'parent_id' => $this->parentID,
            'pin_expires' => $this->pinExpires,
            'pinned_at' => $this->pinnedAt,
            'poll_id' => $this->pollID,
            'quoted_message_id' => $this->quotedMessageID,
            'show_in_channel' => $this->showInChannel,
            'thread_participants' => $this->threadParticipants,
            'draft' => $this->draft,
            'i18n' => $this->i18n,
            'image_labels' => $this->imageLabels,
            'moderation' => $this->moderation,
            'pinned_by' => $this->pinnedBy,
            'poll' => $this->poll,
            'quoted_message' => $this->quotedMessage,
            'reaction_groups' => $this->reactionGroups,
            'reminder' => $this->reminder,
            'shared_location' => $this->sharedLocation,
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
        
        return new static(cid: $json['cid'] ?? null,
            createdAt: $json['created_at'] ?? null,
            deletedReplyCount: $json['deleted_reply_count'] ?? null,
            html: $json['html'] ?? null,
            id: $json['id'] ?? null,
            pinned: $json['pinned'] ?? null,
            replyCount: $json['reply_count'] ?? null,
            shadowed: $json['shadowed'] ?? null,
            silent: $json['silent'] ?? null,
            text: $json['text'] ?? null,
            type: $json['type'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            attachments: $json['attachments'] ?? null,
            latestReactions: $json['latest_reactions'] ?? null,
            mentionedUsers: $json['mentioned_users'] ?? null,
            ownReactions: $json['own_reactions'] ?? null,
            restrictedVisibility: $json['restricted_visibility'] ?? null,
            channel: $json['channel'] ?? null,
            custom: $json['custom'] ?? null,
            reactionCounts: $json['reaction_counts'] ?? null,
            reactionScores: $json['reaction_scores'] ?? null,
            user: $json['user'] ?? null,
            command: $json['command'] ?? null,
            deletedAt: $json['deleted_at'] ?? null,
            messageTextUpdatedAt: $json['message_text_updated_at'] ?? null,
            mml: $json['mml'] ?? null,
            parentID: $json['parent_id'] ?? null,
            pinExpires: $json['pin_expires'] ?? null,
            pinnedAt: $json['pinned_at'] ?? null,
            pollID: $json['poll_id'] ?? null,
            quotedMessageID: $json['quoted_message_id'] ?? null,
            showInChannel: $json['show_in_channel'] ?? null,
            threadParticipants: $json['thread_participants'] ?? null,
            draft: $json['draft'] ?? null,
            i18n: $json['i18n'] ?? null,
            imageLabels: $json['image_labels'] ?? null,
            moderation: $json['moderation'] ?? null,
            pinnedBy: $json['pinned_by'] ?? null,
            poll: $json['poll'] ?? null,
            quotedMessage: $json['quoted_message'] ?? null,
            reactionGroups: $json['reaction_groups'] ?? null,
            reminder: $json['reminder'] ?? null,
            sharedLocation: $json['shared_location'] ?? null
        );
    }
} 
