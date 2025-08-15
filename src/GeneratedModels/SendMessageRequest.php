<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SendMessageRequest extends BaseModel
{
    public function __construct(
        public ?MessageRequest $message = null,
        public ?bool $forceModeration = null,
        public ?bool $keepChannelHidden = null,
        public ?bool $pending = null,
        public ?bool $skipEnrichUrl = null,
        public ?bool $skipPush = null,
        public ?array $pendingMessageMetadata = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
