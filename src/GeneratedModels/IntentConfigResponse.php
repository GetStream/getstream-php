<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IntentConfigResponse extends BaseModel
{
    public function __construct(
        /** @var array<IntentTopicResponse>|null */
        #[ArrayOf(IntentTopicResponse::class)]
        public ?array $topics = null, // Topics conversation text is classified against
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
