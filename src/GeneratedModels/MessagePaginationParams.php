<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime|null $createdAtAfter
 * @property \DateTime|null $createdAtAfterOrEqual
 * @property \DateTime|null $createdAtAround
 * @property \DateTime|null $createdAtBefore
 * @property \DateTime|null $createdAtBeforeOrEqual
 * @property string|null $idAround
 * @property string|null $idGt
 * @property string|null $idGte
 * @property string|null $idLt
 * @property string|null $idLte
 * @property int|null $limit
 */
class MessagePaginationParams extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAtAfter = null, // The timestamp to get messages with a created_at timestamp greater than
        public ?\DateTime $createdAtAfterOrEqual = null, // The timestamp to get messages with a created_at timestamp greater than or equal to
        public ?\DateTime $createdAtAround = null, // The result will be a set of messages, that are both older and newer than the created_at timestamp provided, distributed evenly around the timestamp
        public ?\DateTime $createdAtBefore = null, // The timestamp to get messages with a created_at timestamp smaller than
        public ?\DateTime $createdAtBeforeOrEqual = null, // The timestamp to get messages with a created_at timestamp smaller than or equal to
        public ?string $idAround = null, // The result will be a set of messages, that are both older and newer than the message with the provided ID, and the message with the ID provided will be in the middle of the set
        public ?string $idGt = null, // The ID of the message to get messages with a timestamp greater than
        public ?string $idGte = null, // The ID of the message to get messages with a timestamp greater than or equal to
        public ?string $idLt = null, // The ID of the message to get messages with a timestamp smaller than
        public ?string $idLte = null, // The ID of the message to get messages with a timestamp smaller than or equal to
        public ?int $limit = null, // The maximum number of messages to return (max limit 
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
