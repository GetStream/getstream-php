<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ChannelBatchUpdatedStartedEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $batchCreatedAt = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $finishedAt = null,
        public ?string $operation = null,
        public ?string $status = null,
        public ?int $successChannelsCount = null,
        public ?string $taskID = null,
        public ?array $failedChannels = null,
        public ?object $custom = null,
        public ?string $type = null,
        public ?\DateTime $receivedAt = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
