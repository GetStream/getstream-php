<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a reaction is sent in a call, clients should use this to show the reaction in the call screen
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property ReactionResponse $reaction
 * @property string $type
 */
class CallReactionEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?ReactionResponse $reaction = null,
        public ?string $type = null, // The type of event: "call.reaction_new" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
