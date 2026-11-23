<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateBlockListRequest extends BaseModel
{
    public function __construct(
        public ?string $team = null,
        public ?array $words = null, // List of words to block
        public ?bool $validate = null, // For regex block lists, reject any rule that matches 50% or more of a built-in sample dataset as too broad
        public ?bool $isLeetCheckEnabled = null,
        public ?bool $isPluralCheckEnabled = null,
        public ?bool $isConfusableFoldingEnabled = null,
        public ?bool $isSubstringMatchingEnabled = null,
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
