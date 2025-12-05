<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $channelID
 * @property string $channelType
 * @property string $cid
 * @property \DateTime $createdAt
 * @property int $watcherCount
 * @property string $type
 * @property string|null $team
 * @property array<User>|null $threadParticipants
 * @property Message|null $message
 * @property User|null $user
 */
class MessageNewEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?int $watcherCount = null,
        public ?string $type = null,
        public ?string $team = null,
        /** @var array<User>|null */
        #[ArrayOf(User::class)]
        public ?array $threadParticipants = null,
        public ?Message $message = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
