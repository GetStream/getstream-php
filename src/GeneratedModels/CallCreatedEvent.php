<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when a call is created. Clients receiving this event should check if the ringing
 * field is set to true and if so, show the call screen
 */
class CallCreatedEvent extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        public ?string $type = null, // The type of event: "call.created" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // the members added to this call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
