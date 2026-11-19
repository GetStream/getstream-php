<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * One mark type's policy.
 */
class MarkTypeConfig extends BaseModel
{
    public function __construct(
        public ?array $requires = null, // Attachment types that qualify a message for the mark, any one of them; 1 to 10 entries, required for a custom type. For a built-in type the list replaces the default, and leaving it out keeps the default
        public ?int $maxMembers = null, // Channel size above which the type is off, 1 to 100. Defaults to 100
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
