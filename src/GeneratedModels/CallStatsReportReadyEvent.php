<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * This event is sent when the insights report is ready
 */
class CallStatsReportReadyEvent extends BaseModel
{
    public function __construct(
        public ?string $type = null, // The type of event, "call.report_ready" in this case
        public ?\DateTime $createdAt = null,
        public ?string $callCid = null,
        public ?string $sessionID = null, // Call session ID
        /** @var array<CallStatsParticipant>|null */
        #[ArrayOf(CallStatsParticipant::class)]
        public ?array $participantsOverview = null, // Top participant sessions overview
        public ?bool $isTrimmed = null, // Whether participants_overview is truncated by the server-side limit
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
