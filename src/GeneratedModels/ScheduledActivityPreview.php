<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The activity a scheduled activity will publish
 */
class ScheduledActivityPreview extends BaseModel
{
    public function __construct(
        public ?string $id = null, // ID the activity gets when published
        public ?string $type = null, // Type of activity
        public ?array $feeds = null, // Feeds the activity will be added to
        public ?string $text = null, // Text content of the activity
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // Attachments of the activity
        public ?string $visibility = null, // Visibility of the activity
        public ?string $visibilityTag = null, // Visibility tag of the activity
        public ?string $restrictReplies = null, // Who may reply to the activity
        public ?Location $location = null,
        public ?\DateTime $expiresAt = null, // When the published activity expires
        public ?array $mentionedUserIds = null, // Users mentioned in the activity
        public ?object $searchData = null, // Search data of the activity
        public ?array $filterTags = null, // Filter tags of the activity
        public ?array $interestTags = null, // Interest tags of the activity
        public ?array $collectionRefs = null, // Collections referenced by the activity
        public ?string $parentID = null, // ID of the parent activity
        public ?string $pollID = null, // ID of the poll attached to the activity
        public ?object $custom = null, // Custom data of the activity
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
