<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AutomodDetailsResponse extends BaseModel
{
    public function __construct(
        public ?FlagMessageDetailsResponse $messageDetails = null,
        public ?MessageModerationResult $result = null,
        public ?string $action = null,
        public ?string $originalMessageType = null,
        public ?array $imageLabels = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
