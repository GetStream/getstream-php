<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class IntentTopicRequest extends BaseModel
{
    public function __construct(
        public ?string $label = null, // Unique topic label (e.g. purchase_intent)
        public ?string $description = null, // Optional description used in the classification prompt; the label alone is used when empty
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
