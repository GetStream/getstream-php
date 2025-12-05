<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $activeParticipantCount
 * @property string $channelCid
 * @property \DateTime $createdAt
 * @property string $createdByUserID
 * @property string $parentMessageID
 * @property int $participantCount
 * @property string $title
 * @property \DateTime $updatedAt
 * @property array<MessageResponse> $latestReplies
 * @property object $custom
 * @property \DateTime|null $deletedAt
 * @property \DateTime|null $lastMessageAt
 * @property int|null $replyCount
 * @property array<ReadStateResponse>|null $read
 * @property array<ThreadParticipant>|null $threadParticipants
 * @property ChannelResponse|null $channel
 * @property UserResponse|null $createdBy
 * @property DraftResponse|null $draft
 * @property MessageResponse|null $parentMessage
 */
class ThreadStateResponse extends BaseModel
{
    public function __construct(
        public ?int $activeParticipantCount = null, // Active Participant Count
        public ?string $channelCid = null, // Channel CID
        public ?\DateTime $createdAt = null, // Date/time of creation
        public ?string $createdByUserID = null, // Created By User ID
        public ?string $parentMessageID = null, // Parent Message ID
        public ?int $participantCount = null, // Participant Count
        public ?string $title = null, // Title
        public ?\DateTime $updatedAt = null, // Date/time of the last update
        /** @var array<MessageResponse>|null */
        #[ArrayOf(MessageResponse::class)]
        public ?array $latestReplies = null,
        public ?object $custom = null, // Custom data for this object
        public ?\DateTime $deletedAt = null, // Deleted At
        public ?\DateTime $lastMessageAt = null, // Last Message At
        public ?int $replyCount = null, // Reply Count
        /** @var array<ReadStateResponse>|null */
        #[ArrayOf(ReadStateResponse::class)]
        public ?array $read = null,
        /** @var array<ThreadParticipant>|null Thread Participants */
        #[ArrayOf(ThreadParticipant::class)]
        public ?array $threadParticipants = null, // Thread Participants
        public ?ChannelResponse $channel = null,
        public ?UserResponse $createdBy = null,
        public ?DraftResponse $draft = null,
        public ?MessageResponse $parentMessage = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
