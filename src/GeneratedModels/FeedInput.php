<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $description
 * @property string|null $name
 * @property string|null $visibility
 * @property array|null $filterTags
 * @property array<FeedMemberRequest>|null $members
 * @property object|null $custom
 */
class FeedInput extends BaseModel
{
    public function __construct(
        public ?string $description = null,
        public ?string $name = null,
        public ?string $visibility = null,
        public ?array $filterTags = null,
        /** @var array<FeedMemberRequest>|null */
        #[ArrayOf(FeedMemberRequest::class)]
        public ?array $members = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
