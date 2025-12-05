<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $userID
 * @property array|null $grantPermissions
 * @property array|null $revokePermissions
 */
class UpdateUserPermissionsRequest extends BaseModel
{
    public function __construct(
        public ?string $userID = null,
        public ?array $grantPermissions = null,
        public ?array $revokePermissions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
