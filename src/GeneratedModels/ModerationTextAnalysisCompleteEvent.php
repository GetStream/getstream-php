<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Per-text moderation verdict from /analyze. Fires on every /analyze call that included text inputs. Sibling of moderation.image_analysis.complete with the same audit / reconciliation purpose; for the /analyze origin this event replaces the legacy review_queue_item.* + moderation_check.completed events.
 */
class ModerationTextAnalysisCompleteEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $receivedAt = null,
        public ?string $entityType = null, // Echo of the `entity_type` on the /analyze request.
        public ?string $entityID = null, // Echo of the `entity_id` on the /analyze request.
        public ?string $entityCreatorID = null, // Echo of the `entity_creator_id` on the /analyze request.
        public ?string $configKey = null, // The moderation policy key that was applied.
        public ?string $reviewQueueItemID = null, // Review queue row ID for deep-linking into the dashboard.
        /** @var array<string, AnalyzeTextField>|null */
        #[MapOf(AnalyzeTextField::class)]
        public ?array $texts = null, // Per-text-field verdicts, same shape as the /analyze HTTP response. Each entry carries `id` when the request supplied `content_ids`.
        public ?object $custom = null, // Echo of the `custom` metadata on the /analyze request.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
