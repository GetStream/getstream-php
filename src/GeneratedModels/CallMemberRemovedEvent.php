<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when one or more members are removed from a call
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property array $members
 * @property CallResponse $call
 * @property string $type
 */
class CallMemberRemovedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        public ?array $members = null, // the list of member IDs removed from the call
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.member_removed" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
