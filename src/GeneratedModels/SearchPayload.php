<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SearchPayload extends BaseModel
{
    public function __construct(
        public ?object $filterConditions = null,    // Channel filter conditions 
        public ?int $limit = null,    // Number of messages to return 
        public ?string $next = null,    // Pagination parameter. Cannot be used with non-zero offset. 
        public ?int $offset = null,    // Pagination offset. Cannot be used with sort or next. 
        public ?string $query = null,    // Search phrase 
        public ?array $sort = null,    // Sort parameters. Cannot be used with non-zero offset 
        public ?object $messageFilterConditions = null,    // Message filter conditions 
        public ?MessageOptions $messageOptions = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
