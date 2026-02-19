<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class GetCallResponse extends BaseModel
{
    public function __construct(
        public ?CallResponse $call = null,
        /** @var array<MemberResponse>|null */
        #[ArrayOf(MemberResponse::class)]
        public ?array $members = null,
        /** @var array<OwnCapability>|null */
        #[ArrayOf(OwnCapability::class)]
        public ?array $ownCapabilities = null,
        public ?string $duration = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
