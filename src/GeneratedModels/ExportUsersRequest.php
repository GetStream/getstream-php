<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ExportUsersRequest extends BaseModel
{
    public function __construct(
        public ?array $userIds = null,
        public ?array $channelCids = null, // Limit the export to these channels, in type:id form (at most 100, not empty). Without it every channel of the users is exported.
        public ?\DateTime $messagesFrom = null, // Start of the message window, inclusive: messages with created_at >= messages_from are exported. Unlike export_channels' messages_since, which is exclusive. Reactions are selected by the time they were added, in the same window.
        public ?\DateTime $messagesTo = null, // End of the message window, exclusive: messages with created_at < messages_to are exported. Unlike export_channels' messages_until, which is inclusive. Must be after messages_from. When any of channel_cids, messages_from or messages_to is set, calls are omitted from the export.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
