<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class MessageChangeSet implements JsonSerializable
{
    public function __construct(public ?bool $attachments = null,
        public ?bool $custom = null,
        public ?bool $html = null,
        public ?bool $mentionedUserIds = null,
        public ?bool $mml = null,
        public ?bool $pin = null,
        public ?bool $quotedMessageID = null,
        public ?bool $silent = null,
        public ?bool $text = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'attachments' => $this->attachments,
            'custom' => $this->custom,
            'html' => $this->html,
            'mentioned_user_ids' => $this->mentionedUserIds,
            'mml' => $this->mml,
            'pin' => $this->pin,
            'quoted_message_id' => $this->quotedMessageID,
            'silent' => $this->silent,
            'text' => $this->text,
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
        
        return new static(attachments: $json['attachments'] ?? null,
            custom: $json['custom'] ?? null,
            html: $json['html'] ?? null,
            mentionedUserIds: $json['mentioned_user_ids'] ?? null,
            mml: $json['mml'] ?? null,
            pin: $json['pin'] ?? null,
            quotedMessageID: $json['quoted_message_id'] ?? null,
            silent: $json['silent'] ?? null,
            text: $json['text'] ?? null
        );
    }
} 
