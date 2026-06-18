<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertSetupSessionRequest extends BaseModel
{
    public function __construct(
        public ?string $currentStep = null, // The current step of the setup wizard. One of: welcome, input, configure, live
        public ?string $status = null, // The status of the setup session. One of: in_progress, completed
        public ?object $setupData = null, // Per-step data keyed by step name (welcome, input, configure, live)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
