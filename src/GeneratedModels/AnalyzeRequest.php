<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AnalyzeRequest extends BaseModel
{
    public function __construct(
        public ?string $entityType = null, // Caller-defined entity type. Required with entity_id + entity_creator_id; omit all three for stateless mode.
        public ?string $entityID = null, // Caller-supplied content identifier. Required with entity_type + entity_creator_id; omit all three for stateless mode.
        public ?string $entityCreatorID = null, // ID of the user who created the content. Required with entity_type + entity_id; omit all three for stateless mode.
        public ?string $configKey = null, // Moderation policy key. Optional in stateful mode, required in stateless mode.
        public ?array $texts = null, // Named text fields to moderate, keyed by caller label (e.g. title, description).
        public ?object $custom = null, // Arbitrary metadata surfaced in the dashboard.
        public ?\DateTime $contentPublishedAt = null, // Original timestamp when the content was produced. Used as the `published_at` timestamp on per-content log entries that surface in `matched_contents` on aggregation-rule webhooks.
        public ?array $contentIds = null, // Optional map from a content label (either a `texts` key or an `image:<key>` multipart label) to a caller-supplied per-instance identifier. Echoed on per-field verdicts and surfaced in `matched_contents` when an aggregation rule fires.
        public ?bool $asyncResponse = null, // When true, the response carries no verdicts (status `pending`) and per-modality results arrive via `moderation.text_analysis.complete` and `moderation.image_analysis.complete` webhooks. Image moderation runs on a background worker; text moderation runs synchronously and is then delivered via webhook.
        public ?string $userID = null,
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
