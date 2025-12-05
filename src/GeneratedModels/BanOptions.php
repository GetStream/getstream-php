<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $deleteMessages
 * @property int|null $duration
 * @property bool|null $ipBan
 * @property string|null $reason
 * @property bool|null $shadowBan
 */
class BanOptions extends BaseModel
{
    public function __construct(
        public ?string $deleteMessages = null,
        public ?int $duration = null,
        public ?bool $ipBan = null,
        public ?string $reason = null,
        public ?bool $shadowBan = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
