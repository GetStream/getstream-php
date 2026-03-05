<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CampaignResponse extends BaseModel
{
    public function __construct(
        public ?string $id = null,
        public ?array $segmentIds = null,
        /** @var array<Segment>|null */
        #[ArrayOf(Segment::class)]
        public ?array $segments = null,
        public ?string $senderID = null,
        public ?UserResponse $sender = null,
        public ?string $senderMode = null,
        public ?string $senderVisibility = null,
        public ?string $name = null,
        public ?bool $createChannels = null,
        public ?bool $showChannels = null,
        public ?string $description = null,
        public ?bool $skipPush = null,
        public ?bool $skipWebhook = null,
        public ?\DateTime $scheduledFor = null,
        public ?\DateTime $stopAt = null,
        public ?CampaignMessageTemplate $messageTemplate = null,
        public ?CampaignChannelTemplate $channelTemplate = null,
        public ?array $userIds = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $users = null,
        public ?string $status = null,
        public ?\DateTime $createdAt = null,
        public ?\DateTime $updatedAt = null,
        public ?CampaignStatsResponse $stats = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
