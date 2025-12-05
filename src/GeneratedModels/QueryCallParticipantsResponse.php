<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property int $totalParticipants
 * @property array<MemberResponse> $members
 * @property array<OwnCapability> $ownCapabilities
 * @property array<CallParticipantResponse> $participants
 * @property CallResponse $call
 */
class QueryCallParticipantsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        public ?int $totalParticipants = null,
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null,
        /** @var array<OwnCapability>|null */
        #[ArrayOf(OwnCapability::class)]
        public ?array $ownCapabilities = null,
        /** @var array<CallParticipantResponse>|null List of call participants */
        #[ArrayOf(CallParticipantResponse::class)]
        public ?array $participants = null, // List of call participants
        public ?CallResponse $call = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
