<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $membersLimit
 * @property bool|null $notify
 * @property bool|null $ring
 * @property bool|null $video
 * @property CallRequest|null $data
 */
class GetOrCreateCallRequest extends BaseModel
{
    public function __construct(
        public ?int $membersLimit = null,
        public ?bool $notify = null, // if provided it sends a notification event to the members for this call
        public ?bool $ring = null, // if provided it sends a ring event to the members for this call
        public ?bool $video = null,
        public ?CallRequest $data = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
