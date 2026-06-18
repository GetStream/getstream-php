<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An interest tag with the number of distinct activities the user reacted to that carried it
 */
class InterestTagResponse extends BaseModel
{
    public function __construct(
        public ?string $tag = null, // The interest tag value
        public ?int $count = null, // Number of distinct reacted-to activities tagged with this value
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
