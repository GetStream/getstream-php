<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FeedsNotificationTarget extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?string $userID = null,
        public ?string $type = null,
        public ?string $text = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
        public ?string $name = null,
        public ?FeedsNotificationComment $comment = null,
        public ?FeedsNotificationParentActivity $parentActivity = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
