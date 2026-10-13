<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class NotificationComment extends BaseModel
{
    public function __construct(
        public ?string $id = null, // The ID of the comment
        public ?string $userID = null, // The ID of the user who wrote the comment
        public ?string $comment = null, // The text of the comment
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Attachments on the comment
        public ?string $parentID = null, // The ID of the parent comment when this comment is a reply; omitted for top-level comments
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
