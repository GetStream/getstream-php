<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ExportChannelsRequest implements JsonSerializable
{
    public function __construct(public ?array $channels = null,
        public ?bool $clearDeletedMessageText = null,
        public ?bool $exportUsers = null,
        public ?bool $includeSoftDeletedChannels = null,
        public ?bool $includeTruncatedMessages = null,
        public ?string $version = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'channels' => $this->channels,
            'clear_deleted_message_text' => $this->clearDeletedMessageText,
            'export_users' => $this->exportUsers,
            'include_soft_deleted_channels' => $this->includeSoftDeletedChannels,
            'include_truncated_messages' => $this->includeTruncatedMessages,
            'version' => $this->version,
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
        
        return new static(channels: $json['channels'] ?? null,
            clearDeletedMessageText: $json['clear_deleted_message_text'] ?? null,
            exportUsers: $json['export_users'] ?? null,
            includeSoftDeletedChannels: $json['include_soft_deleted_channels'] ?? null,
            includeTruncatedMessages: $json['include_truncated_messages'] ?? null,
            version: $json['version'] ?? null
        );
    }
} 
