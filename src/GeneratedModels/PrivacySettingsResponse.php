<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The privacy settings of the user.
 */
class PrivacySettingsResponse extends BaseModel
{
    public function __construct(
        public ?TypingIndicatorsResponse $typingIndicators = null, // The settings for typing indicator events.
        public ?ReadReceiptsResponse $readReceipts = null, // The settings for the read receipt events.
        public ?DeliveryReceiptsResponse $deliveryReceipts = null, // The settings for the delivery receipt events.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
