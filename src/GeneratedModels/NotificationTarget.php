<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $id
 * @property string|null $name
 * @property string|null $text
 * @property string|null $type
 * @property string|null $userID
 * @property array<Attachment>|null $attachments
 * @property NotificationComment|null $comment
 */
class NotificationTarget extends BaseModel
{
    public function __construct(
        public ?string $id = null, // The ID of the target (activity ID or user ID)
        public ?string $name = null, // The name of the target user (for user targets like follows)
        public ?string $text = null, // The text content of the target activity (for activity targets)
        public ?string $type = null, // The type of the target activity (for activity targets)
        public ?string $userID = null, // The ID of the user who created the target activity (for activity targets)
        /** @var array<Attachment>|null Attachments on the target activity (for activity targets) */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Attachments on the target activity (for activity targets)
        public ?NotificationComment $comment = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
