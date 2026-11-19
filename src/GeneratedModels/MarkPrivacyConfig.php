<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * How marks follow the marker's privacy settings.
 */
class MarkPrivacyConfig extends BaseModel
{
    public function __construct(
        public ?bool $respectReadReceipts = null, // When true, a mark by a user whose read receipts are off is kept for that user only: the author gets no event and does not see it in mark_groups or in the marks listing. Decided when the mark is written; changing the switch does not rewrite earlier marks. Defaults to false
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
