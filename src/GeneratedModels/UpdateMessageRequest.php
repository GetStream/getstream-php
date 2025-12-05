<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property MessageRequest $message
 * @property bool|null $skipEnrichUrl
 * @property bool|null $skipPush
 */
class UpdateMessageRequest extends BaseModel
{
    public function __construct(
        public ?MessageRequest $message = null,
        public ?bool $skipEnrichUrl = null, // Skip enrich URL
        public ?bool $skipPush = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
