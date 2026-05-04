<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class UpdateCampaignRequest extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?array $segmentIds = null,
        public ?array $userIds = null,
        public ?string $senderID = null,
        public ?string $senderMode = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?bool $createChannels = null,
        public ?bool $showChannels = null,
        public ?bool $skipPush = null,
        public ?bool $skipWebhook = null,
        public ?CampaignMessageTemplate $messageTemplate = null,
        public ?CampaignChannelTemplate $channelTemplate = null,
        public ?string $senderVisibility = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
