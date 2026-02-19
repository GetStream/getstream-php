<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class EventHook extends BaseModel
{
    public function __construct(
        public ?AsyncModerationCallbackConfig $callback = null,
        public ?string $id = null,
        public ?string $hookType = null,
        public ?bool $enabled = null,
        public ?array $eventTypes = null,
        public ?string $webhookUrl = null,
        public ?string $sqsQueueUrl = null,
        public ?string $sqsRegion = null,
        public ?string $sqsAuthType = null,
        public ?string $sqsKey = null,
        public ?string $sqsSecret = null,
        public ?string $sqsRoleArn = null,
        public ?string $snsTopicArn = null,
        public ?string $snsRegion = null,
        public ?string $snsAuthType = null,
        public ?string $snsKey = null,
        public ?string $snsSecret = null,
        public ?string $snsRoleArn = null,
        public ?string $product = null,
        public ?bool $shouldSendCustomEvents = null,
        public ?int $timeoutMs = null,
        public ?bool $snsEventBasedMessageGroupIDEnabled = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
