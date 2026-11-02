<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitModerationFeedbackItem extends BaseModel
{
    public function __construct(
        public ?string $flagID = null, // ID of the moderation flag the feedback is about
        public ?string $reference = null, // Identifies this piece of content within the entity (keyframe ID, caption ID, message ID, title, description, thumbnail, ...)
        public ?string $kind = null, // Content kind: text or image
        public ?string $text = null, // Text content, for kind=text
        public ?string $imageUrl = null, // Image URL, required for kind=image
        public ?array $currentLabels = null, // Classifications originally produced for this item
        public ?string $currentRecommendedAction = null, // Action originally produced for this item
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
