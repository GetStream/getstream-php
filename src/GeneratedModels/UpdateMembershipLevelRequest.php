<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Partial update request for membership level fields. Only specified fields will be updated.
 *
 * @property string|null $description
 * @property string|null $name
 * @property int|null $priority
 * @property array|null $tags
 * @property object|null $custom
 */
class UpdateMembershipLevelRequest extends BaseModel
{
    public function __construct(
        public ?string $description = null, // Optional description of the membership level
        public ?string $name = null, // Display name for the membership level
        public ?int $priority = null, // Priority level (higher numbers = higher priority)
        public ?array $tags = null, // Activity tags this membership level gives access to
        public ?object $custom = null, // Custom data for the membership level
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
