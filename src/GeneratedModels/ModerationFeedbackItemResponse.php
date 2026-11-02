<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationFeedbackItemResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Feedback item ID
        public ?\DateTime $createdAt = null, // When the item was submitted; all items of one submission share it
        public ?string $kind = null, // false_positive or false_negative
        public ?string $reviewQueueItemID = null, // Review queue item the feedback is about
        public ?string $flagID = null, // Flag the feedback disputes
        public ?string $entityType = null, // Type of the moderated entity
        public ?string $entityID = null, // ID of the moderated entity
        public ?string $reference = null, // Which content of the entity the item is about
        public ?string $text = null, // Text content of the item
        public ?string $imageUrl = null, // Image content of the item
        public ?array $currentLabels = null, // Labels the content had
        public ?string $currentRecommendedAction = null, // Action the content had
        public ?array $expectedLabels = null, // Labels the moderator expected
        public ?string $expectedRecommendedAction = null, // Action the moderator expected
        public ?string $description = null, // Moderator's description
        public ?string $confidence = null, // Moderator's confidence
        public ?string $reporterID = null, // Moderator who submitted the feedback
        public ?string $publishedAt = null, // Publish time of a single-message feedback
        public ?string $channelID = null, // Channel of a single-message feedback
        public ?string $bodyguardFeedbackID = null, // Bodyguard's ID for the delivered feedback
        public ?\DateTime $bodyguardSentAt = null, // When Bodyguard accepted the feedback; unset if not sent
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
