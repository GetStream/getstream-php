<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryReviewQueueRequest extends BaseModel
{
    public function __construct(
        public ?int $limit = null,
        public ?int $lockCount = null,    // Number of items to lock (1-25) 
        public ?int $lockDuration = null,    // Duration for which items should be locked 
        public ?bool $lockItems = null,    // Whether to lock items for review (true), unlock items (false), or just fetch (nil) 
        public ?string $next = null,
        public ?string $prev = null,
        public ?bool $statsOnly = null,    // Whether to return only statistics 
        public ?string $userID = null,
        public ?array $sort = null,    // Sorting parameters for the results 
        public ?object $filter = null,    // Filter conditions for review queue items 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
