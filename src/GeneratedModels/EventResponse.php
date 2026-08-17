<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class EventResponse extends BaseModel
{
    public function __construct(
        public ?WSEvent $event = null, // Represents an BaseEvent that happened in Stream Chat
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
