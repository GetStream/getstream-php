<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class QueryCallMembersRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $type = null,
        public ?int $limit = null,
        public ?string $next = null,
        public ?string $prev = null,
        public ?array $sort = null,
        public ?object $filterConditions = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
