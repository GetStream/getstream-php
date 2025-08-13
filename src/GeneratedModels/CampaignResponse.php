<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CampaignResponse implements JsonSerializable
{
    public function __construct(public ?bool $createChannels = null,
        public ?\DateTime $createdAt = null,
        public ?string $description = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $senderID = null,
        public ?string $senderMode = null,
        public ?bool $showChannels = null,
        public ?bool $skipPush = null,
        public ?bool $skipWebhook = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?array $segmentIds = null,
        public ?array $segments = null,
        public ?array $userIds = null,
        public ?array $users = null,
        public ?CampaignStatsResponse $stats = null,
        public ?\DateTime $scheduledFor = null,
        public ?\DateTime $stopAt = null,
        public ?CampaignChannelTemplate $channelTemplate = null,
        public ?CampaignMessageTemplate $messageTemplate = null,
        public ?UserResponse $sender = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'create_channels' => $this->createChannels,
            'created_at' => $this->createdAt,
            'description' => $this->description,
            'id' => $this->id,
            'name' => $this->name,
            'sender_id' => $this->senderID,
            'sender_mode' => $this->senderMode,
            'show_channels' => $this->showChannels,
            'skip_push' => $this->skipPush,
            'skip_webhook' => $this->skipWebhook,
            'status' => $this->status,
            'updated_at' => $this->updatedAt,
            'segment_ids' => $this->segmentIds,
            'segments' => $this->segments,
            'user_ids' => $this->userIds,
            'users' => $this->users,
            'stats' => $this->stats,
            'scheduled_for' => $this->scheduledFor,
            'stop_at' => $this->stopAt,
            'channel_template' => $this->channelTemplate,
            'message_template' => $this->messageTemplate,
            'sender' => $this->sender,
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
        
        return new static(createChannels: $json['create_channels'] ?? null,
            createdAt: $json['created_at'] ?? null,
            description: $json['description'] ?? null,
            id: $json['id'] ?? null,
            name: $json['name'] ?? null,
            senderID: $json['sender_id'] ?? null,
            senderMode: $json['sender_mode'] ?? null,
            showChannels: $json['show_channels'] ?? null,
            skipPush: $json['skip_push'] ?? null,
            skipWebhook: $json['skip_webhook'] ?? null,
            status: $json['status'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            segmentIds: $json['segment_ids'] ?? null,
            segments: $json['segments'] ?? null,
            userIds: $json['user_ids'] ?? null,
            users: $json['users'] ?? null,
            stats: $json['stats'] ?? null,
            scheduledFor: $json['scheduled_for'] ?? null,
            stopAt: $json['stop_at'] ?? null,
            channelTemplate: $json['channel_template'] ?? null,
            messageTemplate: $json['message_template'] ?? null,
            sender: $json['sender'] ?? null
        );
    }
} 
