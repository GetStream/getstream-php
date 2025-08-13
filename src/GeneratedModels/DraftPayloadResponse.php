<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class DraftPayloadResponse implements JsonSerializable
{
    public function __construct(public ?string $id = null,
        public ?string $text = null,
        public ?object $custom = null,
        public ?string $html = null,
        public ?string $mml = null,
        public ?string $parentID = null,
        public ?string $pollID = null,
        public ?string $quotedMessageID = null,
        public ?bool $showInChannel = null,
        public ?bool $silent = null,
        public ?string $type = null,
        public ?array $attachments = null,
        public ?array $mentionedUsers = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'id' => $this->id,
            'text' => $this->text,
            'custom' => $this->custom,
            'html' => $this->html,
            'mml' => $this->mml,
            'parent_id' => $this->parentID,
            'poll_id' => $this->pollID,
            'quoted_message_id' => $this->quotedMessageID,
            'show_in_channel' => $this->showInChannel,
            'silent' => $this->silent,
            'type' => $this->type,
            'attachments' => $this->attachments,
            'mentioned_users' => $this->mentionedUsers,
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
        
        return new static(id: $json['id'] ?? null,
            text: $json['text'] ?? null,
            custom: $json['custom'] ?? null,
            html: $json['html'] ?? null,
            mml: $json['mml'] ?? null,
            parentID: $json['parent_id'] ?? null,
            pollID: $json['poll_id'] ?? null,
            quotedMessageID: $json['quoted_message_id'] ?? null,
            showInChannel: $json['show_in_channel'] ?? null,
            silent: $json['silent'] ?? null,
            type: $json['type'] ?? null,
            attachments: $json['attachments'] ?? null,
            mentionedUsers: $json['mentioned_users'] ?? null
        );
    }
} 
