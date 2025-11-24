<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class CallParticipantTimeline extends BaseModel
{
    public function __construct(
        public ?string $severity = null,
        public ?\DateTime $timestamp = null,
        public ?string $type = null,
        public ?object $data = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
