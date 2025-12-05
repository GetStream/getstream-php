<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<BlockedUserResponse> $blocks
 */
class GetBlockedUsersResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        /** @var array<BlockedUserResponse>|null Array of blocked user object */
        #[ArrayOf(BlockedUserResponse::class)]
        public ?array $blocks = null, // Array of blocked user object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
