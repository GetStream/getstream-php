<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $type
 * @property bool|null $createNotificationActivity
 * @property bool|null $enforceUnique
 * @property bool|null $skipPush
 * @property string|null $userID
 * @property object|null $custom
 * @property UserRequest|null $user
 */
class AddReactionRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of reaction
        public ?bool $createNotificationActivity = null, // Whether to create a notification activity for this reaction
        public ?bool $enforceUnique = null, // Whether to enforce unique reactions per user (remove other reaction types from the user when adding this one)
        public ?bool $skipPush = null,
        public ?string $userID = null,
        public ?object $custom = null, // Custom data for the reaction
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
