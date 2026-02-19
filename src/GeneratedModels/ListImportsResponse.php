<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class ListImportsResponse extends BaseModel
{
    public function __construct(
        /** @var array<ImportTask>|null */
        #[ArrayOf(ImportTask::class)]
        public ?array $importTasks = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
