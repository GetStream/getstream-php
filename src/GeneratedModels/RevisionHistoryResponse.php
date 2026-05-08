<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RevisionHistoryResponse extends BaseModel
{
    public function __construct(
        public ?string $objectID = null,
        public ?string $objectType = null,
        public ?string $userID = null,
        public ?string $actionType = null,
        public ?string $actorType = null,
        public ?array $changedFields = null,
        public ?object $previousObjSerialized = null,
        public ?\DateTime $createdAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
