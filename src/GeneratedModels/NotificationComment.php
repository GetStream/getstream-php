<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $comment
 * @property string $id
 * @property string $userID
 * @property array<Attachment>|null $attachments
 */
class NotificationComment extends BaseModel
{
    public function __construct(
        public ?string $comment = null,
        public ?string $id = null,
        public ?string $userID = null,
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
