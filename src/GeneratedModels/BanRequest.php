<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $targetUserID
 * @property string|null $bannedByID
 * @property string|null $channelCid
 * @property string|null $deleteMessages
 * @property bool|null $ipBan
 * @property string|null $reason
 * @property bool|null $shadow
 * @property int|null $timeout
 * @property UserRequest|null $bannedBy
 */
class BanRequest extends BaseModel
{
    public function __construct(
        public ?string $targetUserID = null, // ID of the user to ban
        public ?string $bannedByID = null, // ID of the user performing the ban
        public ?string $channelCid = null, // Channel where the ban applies
        public ?string $deleteMessages = null,
        public ?bool $ipBan = null, // Whether to ban the user's IP address
        public ?string $reason = null, // Optional explanation for the ban
        public ?bool $shadow = null, // Whether this is a shadow ban
        public ?int $timeout = null, // Duration of the ban in minutes
        public ?UserRequest $bannedBy = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
