<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The mark and whether this request wrote it
 */
class CreateMessageMarkResponse extends BaseModel
{
    public function __construct(
        public ?MessageMarkResponse $mark = null, // A mark one user put on one message, for example played on a voice note. A mark is written once and never removed by users.
        public ?bool $created = null, // Whether this request wrote the mark. False on a repeat and on the author's own mark
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
