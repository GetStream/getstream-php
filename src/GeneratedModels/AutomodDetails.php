<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $action
 * @property string|null $originalMessageType
 * @property array|null $imageLabels
 * @property FlagMessageDetails|null $messageDetails
 * @property MessageModerationResult|null $result
 */
class AutomodDetails extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $originalMessageType = null,
        public ?array $imageLabels = null,
        public ?FlagMessageDetails $messageDetails = null,
        public ?MessageModerationResult $result = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
