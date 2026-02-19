<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedInput extends BaseModel
{
    public function __construct(
        public ?string $name = null,
        public ?string $description = null,
        public ?string $visibility = null,
        public ?object $custom = null,
        public ?array $filterTags = null,
        /** @var array<FeedMemberRequest>|null */
        #[ArrayOf(FeedMemberRequest::class)]
        public ?array $members = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
