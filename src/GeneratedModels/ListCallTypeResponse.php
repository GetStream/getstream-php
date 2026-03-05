<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Response for ListCallType
 */
class ListCallTypeResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, CallTypeResponse>|null */
        #[MapOf(CallTypeResponse::class)]
        public ?array $callTypes = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
