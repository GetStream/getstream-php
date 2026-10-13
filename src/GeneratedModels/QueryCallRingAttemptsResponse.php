<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The ring attempts of a call, newest first.
 */
class QueryCallRingAttemptsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $callID = null, // The ID of the call the attempts belong to
        public ?string $callSessionID = null, // The call session the attempts were limited to, null when every session was read
        public ?string $callType = null, // The type of the call the attempts belong to
        public ?int $count = null, // The number of attempts returned
        /** @var array<RingAttemptResponse>|null */
        #[ArrayOf(RingAttemptResponse::class)]
        public ?array $ringAttempts = null, // The attempts, newest first
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
