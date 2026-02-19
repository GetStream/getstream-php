<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a reaction is sent in a call, clients should use this to show the reaction in the call screen
 */
class CallReactionEvent extends BaseModel
{
    public function __construct(
        public ?VideoReactionResponse $reaction = null,
        public ?string $type = null, // The type of event: "call.reaction_new" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
