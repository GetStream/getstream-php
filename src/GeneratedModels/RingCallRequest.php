<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $video
 * @property array|null $membersIds
 */
class RingCallRequest extends BaseModel
{
    public function __construct(
        public ?bool $video = null, // Indicate if call should be video
        public ?array $membersIds = null, // Members that should receive the ring. If no ids are provided, all call members who are not already in the call will receive ring notifications.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
