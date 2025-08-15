<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryMessageFlagsPayload extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?int $offset = null,
        public ?bool $showDeletedMessages = null,    // Whether to include deleted messages in the results 
        public ?string $userID = null,
        public ?array $sort = null,
        public ?object $filterConditions = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
