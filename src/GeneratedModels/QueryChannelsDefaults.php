<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Defaults applied by the query channels endpoint.
 */
class QueryChannelsDefaults extends BaseModel
{
    public function __construct(
        public ?int $limit = null, // Number of channels returned when `limit` is omitted.
        public ?int $maxLimit = null, // Largest number of channels returned for one request. A bigger `limit` is silently clamped to this value rather than rejected. An app with no per-app override gets a higher ceiling for the narrow case of a request asking for at most one message and one member per channel.
        public ?int $messageLimit = null, // Number of messages returned per channel when `message_limit` is omitted.
        public ?int $memberLimit = null, // Number of members returned per channel when `member_limit` is omitted.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
