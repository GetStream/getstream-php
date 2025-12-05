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
 * @property bool $hardDelete
 * @property string $type
 * @property bool|null $deletedForMe
 * @property string|null $team
 * @property array<User>|null $threadParticipants
 * @property Message|null $message
 * @property User|null $user
 */
class MessageDeletedEvent extends BaseModel
{
    public function __construct(
        public ?string $channelID = null,
        public ?string $channelType = null,
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?bool $hardDelete = null,
        public ?string $type = null,
        public ?bool $deletedForMe = null,
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
