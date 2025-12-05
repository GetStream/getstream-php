<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $cid
 * @property int $rating
 * @property string $reason
 * @property string $sdk
 * @property string $sdkVersion
 * @property string $sessionID
 * @property string $userID
 * @property PlatformDataResponse $platform
 * @property object|null $custom
 */
class UserFeedbackResponse extends BaseModel
{
    public function __construct(
        public ?string $cid = null,
        public ?int $rating = null,
        public ?string $reason = null,
        public ?string $sdk = null,
        public ?string $sdkVersion = null,
        public ?string $sessionID = null,
        public ?string $userID = null,
        public ?PlatformDataResponse $platform = null,
        public ?object $custom = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
