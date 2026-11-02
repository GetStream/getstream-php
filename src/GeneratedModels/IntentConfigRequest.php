<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IntentConfigRequest extends BaseModel
{
    public function __construct(
        /** @var array<IntentTopicRequest>|null */
        #[ArrayOf(IntentTopicRequest::class)]
        public ?array $topics = null, // Topics to classify conversation text against (max 20, labels must be unique)
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
