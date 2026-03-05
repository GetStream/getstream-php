<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelBatchCompletedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?object $custom = null,
        public ?string $operation = null,
        public ?string $status = null,
        public ?string $taskID = null,
        /** @var array<FailedChannelUpdates>|null */
        #[ArrayOf(FailedChannelUpdates::class)]
        public ?array $failedChannels = null,
        public ?int $successChannelsCount = null,
        public ?\DateTime $batchCreatedAt = null,
        public ?\DateTime $finishedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
