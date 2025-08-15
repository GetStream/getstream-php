<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ThreadStateResponse extends BaseModel
{
    public function __construct(
        public ?string $channelCid = null,    // Channel CID 
        public ?\DateTime $createdAt = null,    // Date/time of creation 
        public ?string $createdByUserID = null,    // Created By User ID 
        public ?string $parentMessageID = null,    // Parent Message ID 
        public ?string $title = null,    // Title 
        public ?\DateTime $updatedAt = null,    // Date/time of the last update 
        public ?array $latestReplies = null,
        public ?object $custom = null,    // Custom data for this object 
        public ?int $activeParticipantCount = null,    // Active Participant Count 
        public ?\DateTime $deletedAt = null,    // Deleted At 
        public ?\DateTime $lastMessageAt = null,    // Last Message At 
        public ?int $participantCount = null,    // Participant Count 
        public ?int $replyCount = null,    // Reply Count 
        public ?array $read = null,
        public ?array $threadParticipants = null,    // Thread Participants 
        public ?ChannelResponse $channel = null,
        public ?UserResponse $createdBy = null,
        public ?DraftResponse $draft = null,
        public ?MessageResponse $parentMessage = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
