<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * Request to provide feedback on an activity
 */
class ActivityFeedbackRequest extends BaseModel
{
    public function __construct(
        public ?bool $hide = null,    // Whether to hide this activity 
        public ?bool $muteUser = null,    // Whether to mute the user who created this activity 
        public ?string $reason = null,    // Reason for the feedback (optional) 
        public ?bool $report = null,    // Whether to report this activity 
        public ?bool $showLess = null,    // Whether to show less content like this 
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
