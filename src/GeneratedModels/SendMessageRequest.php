<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SendMessageRequest implements JsonSerializable
{
    public function __construct(public ?MessageRequest $message = null,
        public ?bool $forceModeration = null,
        public ?bool $keepChannelHidden = null,
        public ?bool $pending = null,
        public ?bool $skipEnrichUrl = null,
        public ?bool $skipPush = null,
        public ?array $pendingMessageMetadata = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'message' => $this->message,
            'force_moderation' => $this->forceModeration,
            'keep_channel_hidden' => $this->keepChannelHidden,
            'pending' => $this->pending,
            'skip_enrich_url' => $this->skipEnrichUrl,
            'skip_push' => $this->skipPush,
            'pending_message_metadata' => $this->pendingMessageMetadata,
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
        
        return new static(message: $json['message'] ?? null,
            forceModeration: $json['force_moderation'] ?? null,
            keepChannelHidden: $json['keep_channel_hidden'] ?? null,
            pending: $json['pending'] ?? null,
            skipEnrichUrl: $json['skip_enrich_url'] ?? null,
            skipPush: $json['skip_push'] ?? null,
            pendingMessageMetadata: $json['pending_message_metadata'] ?? null
        );
    }
} 
