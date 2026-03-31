<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for a moderation action
 */
class ModerationActionConfigResponse extends BaseModel
{
    public function __construct(
        public ?string $entityType = null, // Type of entity this action applies to
        public ?int $order = null, // Display order (lower numbers shown first)
        public ?string $action = null, // The action to take
        public ?string $icon = null, // Icon for the dashboard
        public ?string $description = null, // Description of what this action does
        public ?object $custom = null, // Custom data for the action
        public ?string $queueType = null, // Queue type this action config belongs to
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
