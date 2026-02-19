<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class WrappedUnreadCountsResponse extends BaseModel
{
    public function __construct(
        public ?int $totalUnreadCount = null,
        public ?int $totalUnreadThreadsCount = null,
        public ?array $totalUnreadCountByTeam = null,
        /** @var array<UnreadCountsChannel>|null */
        #[ArrayOf(UnreadCountsChannel::class)]
        public ?array $channels = null,
        /** @var array<UnreadCountsChannelType>|null */
        #[ArrayOf(UnreadCountsChannelType::class)]
        public ?array $channelType = null,
        /** @var array<UnreadCountsThread>|null */
        #[ArrayOf(UnreadCountsThread::class)]
        public ?array $threads = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
