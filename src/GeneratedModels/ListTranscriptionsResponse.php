<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 */
class ListTranscriptionsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<CallTranscription>|null */
        #[ArrayOf(CallTranscription::class)]
        public ?array $transcriptions = null, // List of transcriptions for the call
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
