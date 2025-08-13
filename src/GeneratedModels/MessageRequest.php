<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageRequest implements JsonSerializable
{
    public function __construct(public ?string $html = null,
        public ?string $id = null,
        public ?string $mml = null,
        public ?string $parentID = null,
        public ?\DateTime $pinExpires = null,
        public ?bool $pinned = null,
        public ?\DateTime $pinnedAt = null,
        public ?string $pollID = null,
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null,
        public ?bool $silent = null,
        public ?string $text = null,
        public ?string $type = null,
        public ?string $userID = null,
        public ?array $attachments = null,
        public ?array $mentionedUsers = null,
        public ?array $restrictedVisibility = null,
        public ?object $custom = null,
        public ?SharedLocation $sharedLocation = null,
        public ?UserRequest $user = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'html' => $this->html,
            'id' => $this->id,
            'mml' => $this->mml,
            'parent_id' => $this->parentID,
            'pin_expires' => $this->pinExpires,
            'pinned' => $this->pinned,
            'pinned_at' => $this->pinnedAt,
            'poll_id' => $this->pollID,
            'quoted_message_id' => $this->quotedMessageID,
            'show_in_channel' => $this->showInChannel,
            'silent' => $this->silent,
            'text' => $this->text,
            'type' => $this->type,
            'user_id' => $this->userID,
            'attachments' => $this->attachments,
            'mentioned_users' => $this->mentionedUsers,
            'restricted_visibility' => $this->restrictedVisibility,
            'custom' => $this->custom,
            'shared_location' => $this->sharedLocation,
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
        
        return new static(html: $json['html'] ?? null,
            id: $json['id'] ?? null,
            mml: $json['mml'] ?? null,
            parentID: $json['parent_id'] ?? null,
            pinExpires: $json['pin_expires'] ?? null,
            pinned: $json['pinned'] ?? null,
            pinnedAt: $json['pinned_at'] ?? null,
            pollID: $json['poll_id'] ?? null,
            quotedMessageID: $json['quoted_message_id'] ?? null,
            showInChannel: $json['show_in_channel'] ?? null,
            silent: $json['silent'] ?? null,
            text: $json['text'] ?? null,
            type: $json['type'] ?? null,
            userID: $json['user_id'] ?? null,
            attachments: $json['attachments'] ?? null,
            mentionedUsers: $json['mentioned_users'] ?? null,
            restrictedVisibility: $json['restricted_visibility'] ?? null,
            custom: $json['custom'] ?? null,
            sharedLocation: $json['shared_location'] ?? null,
            user: $json['user'] ?? null
        );
    }
} 
