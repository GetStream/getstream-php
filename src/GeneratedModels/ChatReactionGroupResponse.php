<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatReactionGroupResponse extends BaseModel
{
    public function __construct(
        public ?int $count = null,
        public ?int $sumScores = null,
        public ?\DateTime $firstReactionAt = null,
        public ?\DateTime $lastReactionAt = null,
        /** @var array<ChatReactionGroupUserResponse>|null */
        #[ArrayOf(ChatReactionGroupUserResponse::class)]
        public ?array $latestReactionsBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
