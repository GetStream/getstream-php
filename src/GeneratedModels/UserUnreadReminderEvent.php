<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Reminder events allow you to notify your users about unread messages. Reminders can be used to trigger an email, push notification or SMS to the user.
 */
class UserUnreadReminderEvent extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null, // Date/time of creation
        /** @var array<ChannelMessagesResponse>|null */
        #[ArrayOf(ChannelMessagesResponse::class)]
        public ?array $channels = null, // The channels with unread messages
        public ?object $custom = null,
        public ?UserResponseCommonFields $user = null,
        public ?string $type = null, // The type of event: "user.unread_message_reminder" in this case
        public ?\DateTime $receivedAt = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
