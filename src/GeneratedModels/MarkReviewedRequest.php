<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $contentToMarkAsReviewedLimit
 * @property bool|null $disableMarkingContentAsReviewed
 */
class MarkReviewedRequest extends BaseModel
{
    public function __construct(
        public ?int $contentToMarkAsReviewedLimit = null,
        public ?bool $disableMarkingContentAsReviewed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
