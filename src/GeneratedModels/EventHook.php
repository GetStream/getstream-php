<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class EventHook implements JsonSerializable
{
    public function __construct(public ?\DateTime $createdAt = null,
        public ?bool $enabled = null,
        public ?string $hookType = null,
        public ?string $id = null,
        public ?string $snsAuthType = null,
        public ?string $snsKey = null,
        public ?string $snsRegion = null,
        public ?string $snsRoleArn = null,
        public ?string $snsSecret = null,
        public ?string $snsTopicArn = null,
        public ?string $sqsAuthType = null,
        public ?string $sqsKey = null,
        public ?string $sqsQueueUrl = null,
        public ?string $sqsRegion = null,
        public ?string $sqsRoleArn = null,
        public ?string $sqsSecret = null,
        public ?int $timeoutMs = null,
        public ?\DateTime $updatedAt = null,
        public ?string $webhookUrl = null,
        public ?array $eventTypes = null,
        public ?AsyncModerationCallbackConfig $callback = null
    ) {}

    public function jsonSerialize(): array
    {
        return array_filter([
            'created_at' => $this->createdAt,
            'enabled' => $this->enabled,
            'hook_type' => $this->hookType,
            'id' => $this->id,
            'sns_auth_type' => $this->snsAuthType,
            'sns_key' => $this->snsKey,
            'sns_region' => $this->snsRegion,
            'sns_role_arn' => $this->snsRoleArn,
            'sns_secret' => $this->snsSecret,
            'sns_topic_arn' => $this->snsTopicArn,
            'sqs_auth_type' => $this->sqsAuthType,
            'sqs_key' => $this->sqsKey,
            'sqs_queue_url' => $this->sqsQueueUrl,
            'sqs_region' => $this->sqsRegion,
            'sqs_role_arn' => $this->sqsRoleArn,
            'sqs_secret' => $this->sqsSecret,
            'timeout_ms' => $this->timeoutMs,
            'updated_at' => $this->updatedAt,
            'webhook_url' => $this->webhookUrl,
            'event_types' => $this->eventTypes,
            'callback' => $this->callback,
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
        
        return new static(createdAt: $json['created_at'] ?? null,
            enabled: $json['enabled'] ?? null,
            hookType: $json['hook_type'] ?? null,
            id: $json['id'] ?? null,
            snsAuthType: $json['sns_auth_type'] ?? null,
            snsKey: $json['sns_key'] ?? null,
            snsRegion: $json['sns_region'] ?? null,
            snsRoleArn: $json['sns_role_arn'] ?? null,
            snsSecret: $json['sns_secret'] ?? null,
            snsTopicArn: $json['sns_topic_arn'] ?? null,
            sqsAuthType: $json['sqs_auth_type'] ?? null,
            sqsKey: $json['sqs_key'] ?? null,
            sqsQueueUrl: $json['sqs_queue_url'] ?? null,
            sqsRegion: $json['sqs_region'] ?? null,
            sqsRoleArn: $json['sqs_role_arn'] ?? null,
            sqsSecret: $json['sqs_secret'] ?? null,
            timeoutMs: $json['timeout_ms'] ?? null,
            updatedAt: $json['updated_at'] ?? null,
            webhookUrl: $json['webhook_url'] ?? null,
            eventTypes: $json['event_types'] ?? null,
            callback: $json['callback'] ?? null
        );
    }
} 
