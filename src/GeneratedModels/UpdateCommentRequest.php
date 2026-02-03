<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $comment
 * @property bool|null $handleMentionNotifications
 * @property bool|null $skipEnrichUrl
 * @property bool|null $skipPush
 * @property string|null $userID
 * @property array<Attachment>|null $attachments
 * @property array|null $mentionedUserIds
 * @property object|null $custom
 * @property UserRequest|null $user
 */
class UpdateCommentRequest extends BaseModel
{
    public function __construct(
        public ?string $comment = null, // Updated text content of the comment
        public ?bool $handleMentionNotifications = null, // If true, creates notification activities for newly mentioned users and deletes notifications for users no longer mentioned
        public ?bool $skipEnrichUrl = null, // Whether to skip URL enrichment for this comment
        public ?bool $skipPush = null,
        public ?string $userID = null,
        /** @var array<Attachment>|null Updated media attachments for the comment. Providing this field will replace all existing attachments. */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Updated media attachments for the comment. Providing this field will replace all existing attachments.
        public ?array $mentionedUserIds = null, // List of user IDs mentioned in the comment
        public ?object $custom = null, // Updated custom data for the comment
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
