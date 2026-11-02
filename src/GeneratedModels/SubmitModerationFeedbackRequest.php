<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SubmitModerationFeedbackRequest extends BaseModel
{
    public function __construct(
        public ?string $channelID = null, // Optional moderation channel UUID for context
        public ?string $publishedAt = null, // Original publication time of the moderated content (RFC3339). Required unless items is provided
        public ?string $reference = null, // Provider-side reference identifying the moderated content. Required unless items is provided
        public ?string $message = null, // The moderated content the moderator is providing feedback on. Required unless items is provided
        public ?array $currentLabels = null, // Classifications originally produced by the moderation system
        public ?string $currentRecommendedAction = null, // Action originally produced by the moderation system
        public ?string $description = null, // Optional free-form note explaining why the classification was wrong
        public ?array $expectedLabels = null, // Optional moderator-supplied classifications (up to 16 entries)
        public ?string $expectedRecommendedAction = null, // Optional moderator-supplied action
        public ?string $confidence = null, // Moderator's confidence in this feedback (LOW, MEDIUM, HIGH, VERY_HIGH); forwarded to the moderation provider. Optional
        public ?string $entityType = null, // Type of the entity the items belong to
        public ?string $entityID = null, // ID of the entity the items belong to
        public ?string $entityCreatorID = null, // ID of the user who created the entity
        public ?string $reviewQueueItemID = null, // Review queue item the feedback targets, as an alternative to entity_type and entity_id
        /** @var array<SubmitModerationFeedbackItem>|null */
        #[ArrayOf(SubmitModerationFeedbackItem::class)]
        public ?array $items = null, // Pieces of content of one entity the feedback is about (1 to 50)
        public ?bool $falsePositive = null, // Whether the referenced flags are marked (true, default) or unmarked (false) as false positives
        public ?string $feedbackType = null, // false_positive (default) disputes existing detections; false_negative reports missed content: items carry the content, expected_labels is required and flag_id is not allowed
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
