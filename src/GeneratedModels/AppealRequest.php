<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AppealRequest extends BaseModel
{
    public function __construct(
        public ?string $entityID = null, // Unique identifier of the entity being appealed
        public ?string $entityType = null, // Type of entity being appealed (e.g., message, user)
        public ?string $appealReason = null, // Explanation for why the content is being appealed
        public ?array $attachments = null, // Array of Attachment URLs(e.g., images)
        public ?string $reviewQueueItemID = null, // ID of the review queue item (flagged message) that triggered the ban. Applicable only for user ban appeals.
        public ?string $channelCid = null, // CID of the channel ban being appealed. Only used when entity_type is stream:user; omit to appeal the global ban.
        public ?string $userID = null,
        public ?UserRequest $user = null, // User request object
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
