<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpsertActionConfigRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null, // UUID of an existing action config to update; omit to create a new record
        public ?string $entityType = null, // Type of entity this action applies to (e.g. stream:chat:v1:message)
        public ?int $order = null, // Display order in the dashboard (0–100, lower numbers shown first)
        public ?string $action = null, // The action to perform (e.g. ban, delete_message, custom)
        public ?string $icon = null, // Icon identifier for the dashboard button
        public ?string $description = null, // Human-readable label for the dashboard button
        public ?object $custom = null, // Action-specific parameters passed to the action handler
        public ?string $queueType = null, // Queue this config belongs to; null means the default queue
        public ?string $userID = null, // Optional user ID to associate with the audit log entry
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
