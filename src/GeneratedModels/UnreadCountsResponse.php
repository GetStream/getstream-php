<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UnreadCountsResponse extends BaseModel
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
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
