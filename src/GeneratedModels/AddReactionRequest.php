<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AddReactionRequest extends BaseModel
{
    public function __construct(
        public ?string $type = null, // Type of reaction
        public ?object $custom = null, // Custom data for the reaction
        public ?bool $createNotificationActivity = null, // Whether to create a notification activity for this reaction
        /** @deprecated */
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to the notification activity (only applies when create_notification_activity is true) Deprecated: use notification_context.trigger.custom and notification_context.target.custom instead
        public ?bool $skipPush = null,
        public ?bool $enforceUnique = null, // Whether to enforce unique reactions per user (remove other reaction types from the user when adding this one)
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
