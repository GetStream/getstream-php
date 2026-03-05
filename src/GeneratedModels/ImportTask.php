<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ImportTask extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $path = null,
        public ?string $mode = null,
        public ?int $size = null,
        public ?string $state = null,
        /** @var array<ImportTaskHistory>|null */
        #[ArrayOf(ImportTaskHistory::class)]
        public ?array $history = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
