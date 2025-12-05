<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call is created. Clients receiving this event should check if the ringing
 * field is set to true and if so, show the call screen
 *
 * @property string $callCid
 * @property \DateTime $createdAt
 * @property array<MemberResponse> $members
 * @property CallResponse $call
 * @property string $type
 */
class CallCreatedEvent extends BaseModel
{
    public function __construct(
        public ?string $callCid = null,
        public ?\DateTime $createdAt = null,
        /** @var array<MemberResponse>|null the members added to this call */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // the members added to this call
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.created" in this case
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
