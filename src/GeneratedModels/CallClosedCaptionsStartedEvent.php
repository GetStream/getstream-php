<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when call closed caption has started
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property string $type
 */
class CallClosedCaptionsStartedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?string $type = null, // The type of event: "call.closed_captions_started" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
