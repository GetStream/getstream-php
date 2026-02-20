<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class PrivacySettingsResponse extends BaseModel
{
    public function __construct(
        public ?TypingIndicatorsResponse $typingIndicators = null,
        public ?ReadReceiptsResponse $readReceipts = null,
        public ?DeliveryReceiptsResponse $deliveryReceipts = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
