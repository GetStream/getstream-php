<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class UpdateActivityRequest extends BaseModel
{
    public function __construct(
        public ?bool $copyCustomToNotification = null, // Whether to copy custom data to the notification activity (only applies when handle_mention_notifications creates notifications)
        public ?\DateTime $expiresAt = null, // Time when the activity will expire
        public ?bool $handleMentionNotifications = null, // If true, creates notification activities for newly mentioned users and deletes notifications for users no longer mentioned
        public ?string $pollID = null, // Poll ID
        public ?string $restrictReplies = null, // Controls who can add comments/replies to this activity. One of: everyone, people_i_follow, nobody
        public ?bool $runActivityProcessors = null, // If true, runs activity processors on the updated activity. Processors will only run if the activity text and/or attachments are changed. Defaults to false.
        public ?bool $skipEnrichUrl = null, // Whether to skip URL enrichment for the activity
        public ?string $text = null, // The text content of the activity
        public ?string $userID = null,
        public ?string $visibility = null, // Visibility setting for the activity
        public ?string $visibilityTag = null, // If visibility is 'tag', this is the tag name and is required
        /** @var array<Attachment>|null */
        #[ArrayOf(Attachment::class)]
        public ?array $attachments = null, // List of attachments for the activity
        public ?array $collectionRefs = null, // Collections that this activity references
        public ?array $feeds = null, // List of feeds the activity is present in
        public ?array $filterTags = null, // Tags used for filtering the activity
        public ?array $interestTags = null, // Tags indicating interest categories
        public ?array $mentionedUserIds = null, // List of user IDs mentioned in the activity
        public ?object $custom = null, // Custom data for the activity
        public ?ActivityLocation $location = null,
        public ?object $searchData = null, // Additional data for search indexing
        public ?UserRequest $user = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
