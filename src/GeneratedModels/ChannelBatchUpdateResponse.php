<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChannelBatchUpdateResponse extends BaseModel
{
    public function __construct(
        public ?string $taskID = null, // Present for asynchronous updates. Poll this task even if synchronous was requested: an older API node may have queued the update.
        public ?string $duration = null,
        public ?int $successChannelsCount = null, // Positive count of channels selected for a completed synchronous database update, not an affected-row count. Concurrent deletion may reduce the rows written. task_id is absent.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
