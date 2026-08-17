<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class Supporting extends BaseModel
{
    public function __construct(
        /** @var array<Incident>|null */
        #[ArrayOf(Incident::class)]
        public ?array $deliveryIncidentWindows = null,
        public ?array $edgeOutlierZones = null,
        /** @var array<TimeWindow>|null */
        #[ArrayOf(TimeWindow::class)]
        public ?array $sourceDropWindows = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
