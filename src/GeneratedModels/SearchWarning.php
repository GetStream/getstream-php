<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int $warningCode
 * @property string $warningDescription
 * @property int|null $channelSearchCount
 * @property array|null $channelSearchCids
 */
class SearchWarning extends BaseModel
{
    public function __construct(
        public ?int $warningCode = null, // Code corresponding to the warning
        public ?string $warningDescription = null, // Description of the warning
        public ?int $channelSearchCount = null, // Number of channels searched
        public ?array $channelSearchCids = null, // Channel CIDs for the searched channels
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
