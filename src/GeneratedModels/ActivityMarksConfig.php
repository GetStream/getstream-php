<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ActivityMarksConfig extends BaseModel
{
    public function __construct(
        public ?bool $trackSeen = null, // Whether to return per-activity seen status on content feeds
        public ?bool $trackRead = null, // Whether to return per-activity read status on content feeds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
