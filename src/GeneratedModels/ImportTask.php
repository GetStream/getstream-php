<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $id
 * @property string $mode
 * @property string $path
 * @property string $state
 * @property \DateTime $updatedAt
 * @property array<ImportTaskHistory> $history
 * @property int|null $size
 */
class ImportTask extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $mode = null,
        public ?string $path = null,
        public ?string $state = null,
        public ?\DateTime $updatedAt = null,
        /** @var array<ImportTaskHistory>|null */
        #[ArrayOf(ImportTaskHistory::class)]
        public ?array $history = null,
        public ?int $size = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
