<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AppealRequest extends BaseModel
{
    public function __construct(
        public ?string $appealReason = null, // Explanation for why the content is being appealed
        public ?string $entityID = null, // Unique identifier of the entity being appealed
        public ?string $entityType = null, // Type of entity being appealed (e.g., message, user)
        public ?string $userID = null,
        public ?array $attachments = null, // Array of Attachment URLs(e.g., images)
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
