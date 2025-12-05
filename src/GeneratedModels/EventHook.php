<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime|null $createdAt
 * @property bool|null $enabled
 * @property string|null $hookType
 * @property string|null $id
 * @property string|null $product
 * @property bool|null $shouldSendCustomEvents
 * @property string|null $snsAuthType
 * @property string|null $snsKey
 * @property string|null $snsRegion
 * @property string|null $snsRoleArn
 * @property string|null $snsSecret
 * @property string|null $snsTopicArn
 * @property string|null $sqsAuthType
 * @property string|null $sqsKey
 * @property string|null $sqsQueueUrl
 * @property string|null $sqsRegion
 * @property string|null $sqsRoleArn
 * @property string|null $sqsSecret
 * @property int|null $timeoutMs
 * @property \DateTime|null $updatedAt
 * @property string|null $webhookUrl
 * @property array|null $eventTypes
 * @property AsyncModerationCallbackConfig|null $callback
 */
class EventHook extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?bool $enabled = null,
        public ?string $hookType = null,
        public ?string $id = null,
        public ?string $product = null,
        public ?bool $shouldSendCustomEvents = null,
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
        public ?AsyncModerationCallbackConfig $callback = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
