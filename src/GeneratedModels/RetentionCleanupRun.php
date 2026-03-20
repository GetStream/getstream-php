<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RetentionCleanupRun extends BaseModel
{
    public function __construct(
        public ?int $appPk = null,
        public ?string $policy = null,
        public ?\DateTime $date = null,
        public ?\DateTime $startedAt = null,
        public ?\DateTime $finishedAt = null,
        public ?string $status = null,
        public ?\DateTime $cursorTs = null,
        public ?string $cursorID = null,
        public ?RunStats $stats = null,
        public ?string $error = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
