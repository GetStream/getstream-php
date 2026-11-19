<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The marks of one type on a message the viewer authored: the count of every user who marked it and the newest 100 of them.
 */
class MarkGroupResponse extends BaseModel
{
    public function __construct(
        public ?int $count = null, // Number of users who marked the message with this type
        /** @var array<MessageMarkerResponse>|null */
        #[ArrayOf(MessageMarkerResponse::class)]
        public ?array $latestBy = null, // The users who marked the message with this type, newest first, at most 100
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
