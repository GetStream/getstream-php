<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool $createChannels
 * @property \DateTime $createdAt
 * @property string $description
 * @property string $id
 * @property string $name
 * @property string $senderID
 * @property string $senderMode
 * @property string $senderVisibility
 * @property bool $showChannels
 * @property bool $skipPush
 * @property bool $skipWebhook
 * @property string $status
 * @property \DateTime $updatedAt
 * @property array $segmentIds
 * @property array<Segment> $segments
 * @property array $userIds
 * @property array<UserResponse> $users
 * @property CampaignStatsResponse $stats
 * @property \DateTime|null $scheduledFor
 * @property \DateTime|null $stopAt
 * @property CampaignChannelTemplate|null $channelTemplate
 * @property CampaignMessageTemplate|null $messageTemplate
 * @property UserResponse|null $sender
 */
class CampaignResponse extends BaseModel
{
    public function __construct(
        public ?bool $createChannels = null,
        public ?\DateTime $createdAt = null,
        public ?string $description = null,
        public ?string $id = null,
        public ?string $name = null,
        public ?string $senderID = null,
        public ?string $senderMode = null,
        public ?string $senderVisibility = null,
        public ?bool $showChannels = null,
        public ?bool $skipPush = null,
        public ?bool $skipWebhook = null,
        public ?string $status = null,
        public ?\DateTime $updatedAt = null,
        public ?array $segmentIds = null,
        /** @var array<Segment>|null */
        #[ArrayOf(Segment::class)]
        public ?array $segments = null,
        public ?array $userIds = null,
        /** @var array<UserResponse>|null */
        #[ArrayOf(UserResponse::class)]
        public ?array $users = null,
        public ?CampaignStatsResponse $stats = null,
        public ?\DateTime $scheduledFor = null,
        public ?\DateTime $stopAt = null,
        public ?CampaignChannelTemplate $channelTemplate = null,
        public ?CampaignMessageTemplate $messageTemplate = null,
        public ?UserResponse $sender = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
