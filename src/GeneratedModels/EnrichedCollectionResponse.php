<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $id
 * @property string $name
 * @property string $status
 * @property \DateTime|null $createdAt
 * @property \DateTime|null $updatedAt
 * @property string|null $userID
 * @property object|null $custom
 */
class EnrichedCollectionResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier for the collection within its name
        public ?string $name = null, // Name/type of the collection
        public ?string $status = null, // Enrichment status of the collection
        public ?\DateTime $createdAt = null, // When the collection was created
        public ?\DateTime $updatedAt = null, // When the collection was last updated
        public ?string $userID = null, // ID of the user who owns this collection
        public ?object $custom = null, // Custom data for the collection
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
