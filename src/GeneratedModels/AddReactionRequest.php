<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class AddReactionRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null,    // Type of reaction 
        public ?bool $createNotificationActivity = null,    // Whether to create a notification activity for this reaction 
        public ?string $userID = null,
        public ?object $custom = null,    // Custom data for the reaction 
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
