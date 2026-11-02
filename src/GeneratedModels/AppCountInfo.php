<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AppCountInfo extends BaseModel
{
    public function __construct(
        public ?string $conditionType = null, // The app-wide count condition that fired: `app_channel_count` or `app_message_count`.
        public ?int $threshold = null, // The configured threshold. The rule fires when the count reaches it.
        public ?string $timeWindow = null, // The configured time window, e.g. `5m`.
        public ?int $count = null, // Channels created or messages sent in the app within the window when the rule fired, the triggering event included.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
