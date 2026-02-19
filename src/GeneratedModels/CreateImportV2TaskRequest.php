<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Client request
 */
class CreateImportV2TaskRequest extends BaseModel
{
    public function __construct(
        public ?ImportV2TaskSettings $settings = null,
        public ?UserRequest $user = null,
        public ?string $product = null,
        public ?string $userID = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
