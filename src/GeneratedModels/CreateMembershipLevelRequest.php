<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string|null $description
 * @property int|null $priority
 * @property array|null $tags
 * @property object|null $custom
 */
class CreateMembershipLevelRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the membership level
        public ?string $name = null, // Display name for the membership level
        public ?string $description = null, // Optional description of the membership level
        public ?int $priority = null, // Priority level (higher numbers = higher priority)
        public ?array $tags = null, // Activity tags this membership level gives access to
        public ?object $custom = null, // Custom data for the membership level
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
