<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class DeleteChannelsResponse extends BaseModel
{
    public function __construct(
        /** @var array<string, DeleteChannelsResultResponse>|null */
        #[MapOf(DeleteChannelsResultResponse::class)]
        public ?array $result = null, // Map of channel IDs and their deletion results
        public ?string $taskID = null,
        public ?string $duration = null, // Duration of the request in milliseconds
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
