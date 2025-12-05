<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $comment
 * @property bool|null $createNotificationActivity
 * @property string|null $id
 * @property string|null $objectID
 * @property string|null $objectType
 * @property string|null $parentID
 * @property bool|null $skipEnrichUrl
 * @property bool|null $skipPush
 * @property string|null $userID
 * @property array<Attachment>|null $attachments
 * @property array|null $mentionedUserIds
 * @property object|null $custom
 * @property UserRequest|null $user
 */
class AddCommentRequest extends BaseModel
{
    public function __construct(
        public ?string $comment = null, // Text content of the comment
        public ?bool $createNotificationActivity = null, // Whether to create a notification activity for this comment
        public ?string $id = null, // Optional custom ID for the comment (max 255 characters). If not provided, a UUID will be generated.
        public ?string $objectID = null, // ID of the object to comment on. Required for root comments
        public ?string $objectType = null, // Type of the object to comment on. Required for root comments
        public ?string $parentID = null, // ID of parent comment for replies. When provided, object_id and object_type are automatically inherited from the parent comment.
        public ?bool $skipEnrichUrl = null, // Whether to skip URL enrichment for this comment
        public ?bool $skipPush = null,
        public ?string $userID = null,
        /** @var array<Attachment>|null Media attachments for the reply */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Media attachments for the reply
        public ?array $mentionedUserIds = null, // List of users mentioned in the reply
        public ?object $custom = null, // Custom data for the comment
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
