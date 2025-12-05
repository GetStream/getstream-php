<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property \DateTime $createdAt
 * @property string $id
 * @property string $pushProvider
 * @property string $userID
 * @property bool|null $disabled
 * @property string|null $disabledReason
 * @property string|null $pushProviderName
 * @property bool|null $voip
 */
class Device extends BaseModel
{
    public function __construct(
        public ?\DateTime $createdAt = null,
        public ?string $id = null,
        public ?string $pushProvider = null,
        public ?string $userID = null,
        public ?bool $disabled = null,
        public ?string $disabledReason = null,
        public ?string $pushProviderName = null,
        public ?bool $voip = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
