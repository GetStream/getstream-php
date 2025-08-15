<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class PrivacySettingsResponse extends BaseModel
{
    public function __construct(
        public ?ReadReceiptsResponse $readReceipts = null,
        public ?TypingIndicatorsResponse $typingIndicators = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
