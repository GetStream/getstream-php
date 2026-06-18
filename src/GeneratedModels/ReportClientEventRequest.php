<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Reports a batch of client-side telemetry events. Each event is validated and processed independently; one invalid event does not block the rest of the batch.
 */
class ReportClientEventRequest extends BaseModel
{
    public function __construct(
        /** @var array<ClientEvent>|null */
        #[ArrayOf(ClientEvent::class)]
        public ?array $events = null, // Client-side events to report (1-100 per request)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
