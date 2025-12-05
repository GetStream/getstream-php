<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $allRead
 * @property bool $allSeen
 * @property \DateTime $createdAt
 * @property string $feedID
 * @property string $userID
 * @property string $type
 * @property array|null $markedRead
 * @property array|null $markedWatched
 */
class ActivityMarkedEvent extends BaseModel
{
    public function __construct(
        public ?bool $allRead = null,
        public ?bool $allSeen = null,
        public ?\DateTime $createdAt = null,
        public ?string $feedID = null,
        public ?string $userID = null,
        public ?string $type = null,
        public ?array $markedRead = null,
        public ?array $markedWatched = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
