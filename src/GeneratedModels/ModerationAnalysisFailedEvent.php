<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * An /analyze call was acknowledged but its moderation could not be completed, so no verdict exists for the content. The content was NOT screened — treat it as unverified rather than clean, and re-submit if a verdict is required.
 */
class ModerationAnalysisFailedEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?string $entityType = null, // Echo of the `entity_type` on the /analyze request.
        public ?string $entityID = null, // Echo of the `entity_id` on the /analyze request.
        public ?string $entityCreatorID = null, // Echo of the `entity_creator_id` on the /analyze request.
        public ?string $configKey = null, // The moderation policy key the request targeted.
        public ?array $contentIds = null, // Echo of the request's `content_ids`, keyed by text/image label. On keyframe and caption streams every request repeats the same entity_type/entity_id/entity_creator_id, so this is what identifies the specific submission that went unscreened.
        public ?object $custom = null, // Echo of the `custom` metadata on the /analyze request.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
