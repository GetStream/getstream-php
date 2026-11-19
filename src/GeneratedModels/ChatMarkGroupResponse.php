<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ChatMarkGroupResponse extends BaseModel
{
    public function __construct(
        public ?int $count = null,
        /** @var array<ChatMessageMarkerResponse>|null */
        #[ArrayOf(ChatMessageMarkerResponse::class)]
        public ?array $latestBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
