<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The total unread information from the current user.
 */
class WrappedUnreadCountsResponse extends BaseModel
{
    public function __construct(
        public ?int $totalUnreadCount = null, // The total number of unread messages.
        public ?int $totalUnreadThreadsCount = null, // The total number of unread threads.
        public ?array $totalUnreadCountByTeam = null, // The total number of unread messages grouped by team.
        /** @var array<UnreadCountsChannel>|null */
        #[ArrayOf(UnreadCountsChannel::class)]
        public ?array $channels = null, // The unread information per channel.
        /** @var array<UnreadCountsChannelType>|null */
        #[ArrayOf(UnreadCountsChannelType::class)]
        public ?array $channelType = null, // The unread information per channel type.
        /** @var array<UnreadCountsThread>|null */
        #[ArrayOf(UnreadCountsThread::class)]
        public ?array $threads = null, // The unread information per thread.
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
