<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 */
class GetDailyDigestResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $status = null,
        public ?string $date = null,
        public ?int $retryAfter = null,
        public ?string $generatedAt = null,
        public ?string $schemaVersion = null,
        public ?int $revision = null,
        public ?array $digestKinds = null,
        public ?BroadcastDailyRollup $broadcastRollup = null,
        /** @var array<DailyDigestCallSessionSummary>|null */
        #[ArrayOf(DailyDigestCallSessionSummary::class)]
        public ?array $callSessions = null,
        /** @var array<BroadcastDigest>|null */
        #[ArrayOf(BroadcastDigest::class)]
        public ?array $broadcasts = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
