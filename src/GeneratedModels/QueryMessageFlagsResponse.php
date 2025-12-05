<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Query message flags response
 *
 * @property string $duration
 * @property array<MessageFlagResponse> $flags
 */
class QueryMessageFlagsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<MessageFlagResponse>|null The flags that match the query */
        #[ArrayOf(MessageFlagResponse::class)]
        public ?array $flags = null, // The flags that match the query
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
