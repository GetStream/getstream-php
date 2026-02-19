<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AddActivityRequest extends BaseModel
{
    public function __construct(
        public ?ActivityLocation $location = null,
        public ?string $id = null, // Optional ID for the activity
        public ?string $type = null, // Type of activity
        public ?string $userID = null, // ID of the user creating the activity
        public ?array $feeds = null, // List of feeds to add the activity to with a default max limit of 25 feeds
        public ?string $text = null, // Text content of the activity
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // List of attachments for the activity
        public ?string $visibility = null, // Visibility setting for the activity. One of: public, private, tag
        public ?string $visibilityTag = null, // If visibility is 'tag', this is the tag name and is required
        public ?string $restrictReplies = null, // Controls who can add comments/replies to this activity. One of: everyone, people_i_follow, nobody
        public ?string $expiresAt = null, // Expiration time for the activity
        public ?array $mentionedUserIds = null, // List of users mentioned in the activity
        public ?object $searchData = null, // Additional data for search indexing
        public ?array $filterTags = null, // Tags for filtering activities
        public ?array $interestTags = null, // Tags for indicating user interests
        public ?array $collectionRefs = null, // Collections that this activity references
        public ?string $parentID = null, // ID of parent activity for replies/comments
        public ?string $pollID = null, // ID of a poll to attach to activity
        public ?object $custom = null, // Custom data for the activity
        public ?bool $skipEnrichUrl = null, // Whether to skip URL enrichment for the activity
        public ?bool $createNotificationActivity = null, // Whether to create notification activities for mentioned users
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to the notification activity (only applies when create_notification_activity is true)
        public ?bool $skipPush = null, // Whether to skip push notifications
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
