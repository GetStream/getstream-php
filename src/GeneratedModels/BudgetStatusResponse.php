<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class BudgetStatusResponse extends BaseModel
{
    public function __construct(
        public ?int $limitMs = null, // Database time in milliseconds the endpoint may use per sliding window
        public ?int $usedMs = null, // Database time in milliseconds used in the current sliding window, including requests still in flight
        public ?int $remainingMs = null, // Database time in milliseconds left in the current sliding window, never negative
        public ?int $windowSeconds = null, // Length of the sliding window in seconds
        public ?int $reset = null, // The Unix timestamp at which all usage currently in the window will have expired, if no new usage is added. The current time when no usage is recorded in the window. Can be in the future while used_ms is 0, when earlier usage was refunded
        public ?bool $enforced = null, // Whether exhausting the budget rejects requests with HTTP 429. False when the budget is only measured, or while enforcement is temporarily suspended
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
