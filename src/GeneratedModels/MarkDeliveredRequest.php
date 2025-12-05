<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property array<DeliveredMessagePayload>|null $latestDeliveredMessages
 */
class MarkDeliveredRequest extends BaseModel
{
    public function __construct(
        /** @var array<DeliveredMessagePayload>|null */
        #[ArrayOf(DeliveredMessagePayload::class)]
        public ?array $latestDeliveredMessages = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
