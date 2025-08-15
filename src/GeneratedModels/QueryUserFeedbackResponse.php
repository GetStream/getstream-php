<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Basic response information
 */
class QueryUserFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,    // Duration of the request in milliseconds 
        public ?array $userFeedback = null,
        public ?string $next = null,
        public ?string $prev = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
