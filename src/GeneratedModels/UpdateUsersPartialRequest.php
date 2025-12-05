<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<UpdateUserPartialRequest> $users
 */
class UpdateUsersPartialRequest extends BaseModel
{
    public function __construct(
        /** @var array<UpdateUserPartialRequest>|null */
        #[ArrayOf(UpdateUserPartialRequest::class)]
        public ?array $users = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
