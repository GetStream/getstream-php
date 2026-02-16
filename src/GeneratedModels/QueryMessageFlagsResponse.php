<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Query message flags response
 */
class QueryMessageFlagsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<MessageFlagResponse>|null */
        #[ArrayOf(MessageFlagResponse::class)]
        public ?array $flags = null, // The flags that match the query
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
