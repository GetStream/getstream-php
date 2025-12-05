<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property DeliveryReceipts|null $deliveryReceipts
 * @property ReadReceipts|null $readReceipts
 * @property TypingIndicators|null $typingIndicators
 */
class PrivacySettings extends BaseModel
{
    public function __construct(
        public ?DeliveryReceipts $deliveryReceipts = null,
        public ?ReadReceipts $readReceipts = null,
        public ?TypingIndicators $typingIndicators = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
