<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class BanActionRequest extends BaseModel
{
    public function __construct(
        public ?bool $channelBanOnly = null,
        public ?string $deleteMessages = null,
        public ?bool $ipBan = null,
        public ?string $reason = null,
        public ?bool $shadow = null,
        public ?int $timeout = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
