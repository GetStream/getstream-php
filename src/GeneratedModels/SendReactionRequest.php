<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class SendReactionRequest extends BaseModel
{
    public function __construct(
        public ?ReactionRequest $reaction = null,
        public ?bool $enforceUnique = null,    // Whether to replace all existing user reactions 
        public ?bool $skipPush = null,    // Skips any mobile push notifications 
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
