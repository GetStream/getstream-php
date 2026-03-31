<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateCommentRequest extends BaseModel
{
    public function __construct(
        public ?string $comment = null, // Updated text content of the comment
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Updated media attachments for the comment. Providing this field will replace all existing attachments.
        public ?object $custom = null, // Updated custom data for the comment
        public ?array $mentionedUserIds = null, // List of user IDs mentioned in the comment
        public ?bool $skipPush = null,
        public ?bool $skipEnrichUrl = null, // Whether to skip URL enrichment for this comment
        public ?bool $handleMentionNotifications = null, // If true, creates notification activities for newly mentioned users and deletes notifications for users no longer mentioned
        /** @deprecated */
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to the notification activity (only applies when handle_mention_notifications creates notifications) Deprecated: use notification_context.trigger.custom and notification_context.target.custom instead
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
