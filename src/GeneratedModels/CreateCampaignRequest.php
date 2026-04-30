<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreateCampaignRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?array $segmentIds = null, // The IDs of the segments to send the campaign to. Duplicate user IDs are removed. Use either user_ids or segment_ids, not both
        public ?array $userIds = null, // The userIDs to send the campaign to. Use either segment ids or user ids not both
        public ?string $senderID = null, // The user ID of the sender
        public ?string $senderMode = null, // The sender mode of the campaign
        public ?string $name = null, // The name of the campaign
        public ?string $description = null, // The description of the campaign
        public ?bool $createChannels = null, // Whether to create channels for the campaign, if they don't exist
        public ?bool $showChannels = null, // Whether the campaign should show channels, if they are hidden
        public ?bool $skipPush = null, // Whether to skip push notifications
        public ?bool $skipWebhook = null, // Whether to skip webhooks
        public ?CampaignMessageTemplate $messageTemplate = null,
        public ?CampaignChannelTemplate $channelTemplate = null,
        public ?string $senderVisibility = null, // The visibility of the created channels for the sender
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
