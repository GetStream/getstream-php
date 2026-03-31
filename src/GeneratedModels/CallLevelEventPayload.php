<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallLevelEventPayload extends BaseModel
{
    public function __construct(
        public ?int $timestamp = null,
        public ?string $userID = null,
        public ?string $eventType = null,
        public ?object $payload = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
