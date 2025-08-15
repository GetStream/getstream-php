<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class APIError extends BaseModel
{
    public function __construct(
        public ?int $code = null,    // API error code 
        public ?string $duration = null,    // Request duration 
        public ?string $message = null,    // Message describing an error 
        public ?string $moreInfo = null,    // URL with additional information 
        public ?int $statusCode = null,    // Response HTTP status code 
        public ?array $details = null,    // Additional error-specific information 
        public ?bool $unrecoverable = null,    // Flag that indicates if the error is unrecoverable, requests that return unrecoverable errors should not be retried, this error only applies to the request that caused it 
        public ?array $exceptionFields = null,    // Additional error info 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
