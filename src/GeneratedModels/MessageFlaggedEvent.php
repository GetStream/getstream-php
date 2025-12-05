<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $cid
 * @property \DateTime $createdAt
 * @property string $type
 * @property array<User>|null $threadParticipants
 * @property Flag|null $flag
 * @property Message|null $message
 * @property User|null $user
 */
class MessageFlaggedEvent extends BaseModel
{
    public function __construct(
        public ?string $cid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null,
        /** @var array<User>|null */
        #[ArrayOf(User::class)]
        public ?array $threadParticipants = null,
        public ?Flag $flag = null,
        public ?Message $message = null,
        public ?User $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
