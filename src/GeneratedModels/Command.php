<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents custom chat command
 *
 * @property string $args
 * @property string $description
 * @property string $name
 * @property string $set
 * @property \DateTime|null $createdAt
 * @property \DateTime|null $updatedAt
 */
class Command extends BaseModel
{
    public function __construct(
        public ?string $args = null, // Arguments help text, shown in commands auto-completion
        public ?string $description = null, // Description, shown in commands auto-completion
        public ?string $name = null, // Unique command name
        public ?string $set = null, // Set name used for grouping commands
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
