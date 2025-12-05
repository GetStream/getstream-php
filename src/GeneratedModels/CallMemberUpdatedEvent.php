<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when one or more members are updated
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property array<MemberResponse> $members
 * @property CallResponse $call
 * @property string $type
 */
class CallMemberUpdatedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        /** @var array<MemberResponse>|null The list of members that were updated */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // The list of members that were updated
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.member_updated" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
