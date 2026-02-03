<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Client request
 *
 * @property string $product
 * @property ImportV2TaskSettings $settings
 * @property string|null $userID
 * @property UserRequest|null $user
 */
class CreateImportV2TaskRequest extends BaseModel
{
    public function __construct(
        public ?string $product = null,
        public ?ImportV2TaskSettings $settings = null,
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
