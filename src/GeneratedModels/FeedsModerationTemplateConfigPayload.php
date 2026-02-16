<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Configuration for a feeds moderation template
 */
class FeedsModerationTemplateConfigPayload extends BaseModel
{
    public function __construct(
        public ?array $dataTypes = null, // Map of data type names to their content types
        public ?string $configKey = null, // Key of the moderation configuration to use
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
