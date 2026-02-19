<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Represents user reaction to a message
 */
class ReactionRequest extends BaseModel
{
    public function __construct(
        public ?UserRequest $user = null,
        public ?string $type = null, // The type of reaction (e.g. 'like', 'laugh', 'wow')
        public ?int $score = null, // Reaction score. If not specified reaction has score of 1
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?object $custom = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
