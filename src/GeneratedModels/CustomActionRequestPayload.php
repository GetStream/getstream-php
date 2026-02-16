<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for custom moderation action
 */
class CustomActionRequestPayload extends BaseModel
{
    public function __construct(
        public ?string $id = null, // Custom action identifier
        public ?object $options = null, // Custom action options
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
