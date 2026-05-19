<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitModerationFeedbackRequest extends BaseModel
{
    public function __construct(
        public ?string $channelID = null, // Optional moderation channel UUID for context
        public ?string $publishedAt = null, // Original publication time of the moderated content (RFC3339)
        public ?string $reference = null, // Provider-side reference identifying the moderated content
        public ?string $message = null, // The moderated content the moderator is providing feedback on
        public ?array $currentLabels = null, // Classifications originally produced by the moderation system
        public ?string $currentRecommendedAction = null, // Action originally produced by the moderation system
        public ?string $description = null, // Optional free-form note explaining why the classification was wrong
        public ?array $expectedLabels = null, // Optional moderator-supplied classifications (up to 16 entries)
        public ?string $expectedRecommendedAction = null, // Optional moderator-supplied action
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
