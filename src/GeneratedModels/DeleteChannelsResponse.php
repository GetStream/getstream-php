<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteChannelsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?string $taskID = null,
        /** @var array<string, DeleteChannelsResultResponse>|null */
        #[MapOf(DeleteChannelsResultResponse::class)]
        public ?array $result = null, // Map of channel IDs and their deletion results
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
