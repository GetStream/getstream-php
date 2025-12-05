<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * CallStateResponseFields is the payload for call state response
 *
 * @property array<MemberResponse> $members
 * @property array<OwnCapability> $ownCapabilities
 * @property CallResponse $call
 */
class CallStateResponseFields extends BaseModel
{
    public function __construct(
        /** @var array<MemberResponse>|null List of call members */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null, // List of call members
        /** @var array<OwnCapability>|null */
        #[ArrayOf(OwnCapability::class)]
        public ?array $ownCapabilities = null,
        public ?CallResponse $call = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
