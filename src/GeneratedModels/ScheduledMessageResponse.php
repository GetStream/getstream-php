<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * A message scheduled to be sent later
 */
class ScheduledMessageResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Unique identifier of the scheduled message
        public ?string $cid = null, // The CID of the channel the message will be sent to
        public ?UserResponse $user = null, // User response object
        public ?ScheduledMessageContentResponse $message = null, // The message a scheduled message will send
        public ?\DateTime $scheduledAt = null, // Date/time the message is scheduled to be sent
        public ?string $status = null, // Status of the scheduled message. One of: scheduled, sending, failed, canceled, sent. A message is sending from its first send attempt until it is sent or fails, including while it waits to retry a failed attempt; it cannot be edited, canceled or sent now while sending
        public ?string $failureReason = null, // Why sending the message failed. Only set when status is failed. One of: banned, no_permission, channel_frozen, channel_deleted, user_deleted, moderation_blocked, hook_rejected, expired, internal_error, invalid_message, pending_not_supported
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?ScheduledMessageChannelResponse $channel = null, // The channel of a scheduled message
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
