<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ThreadStateResponse extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null, // Channel CID
        public ?ChannelResponse $channel = null,
        public ?string $parentMessageID = null, // Parent Message ID
        public ?MessageResponse $parentMessage = null,
        public ?string $createdByUserID = null, // Created By User ID
        public ?UserResponse $createdBy = null,
        public ?int $replyCount = null, // Reply Count
        public ?int $participantCount = null, // Participant Count
        public ?int $activeParticipantCount = null, // Active Participant Count
        /** @var array<ThreadParticipant>|null */
        #[ArrayOf(ThreadParticipant::class)]
        public ?array $threadParticipants = null, // Thread Participants
        public ?\DateTime $lastMessageAt = null, // Last Message At
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        public ?\DateTime $deletedAt = null, // Deleted At
        public ?string $title = null, // Title
        public ?object $custom = null, // Custom data for this object
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $latestReplies = null,
        /** @var array<ReadStateResponse>|null */
        #[ArrayOf(ReadStateResponse::class)]
        public ?array $read = null,
        public ?DraftResponse $draft = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
