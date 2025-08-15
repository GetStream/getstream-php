<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * This event is sent when closed captions are being sent in a call, clients should use this to show the closed captions in the call screen
 */
class ClosedCaptionEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?CallClosedCaption $closedCaption = null,
        public ?string $type = null,    // The type of event: "call.closed_caption" in this case 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
