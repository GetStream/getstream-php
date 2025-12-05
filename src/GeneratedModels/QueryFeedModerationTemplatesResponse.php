<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<QueryFeedModerationTemplate> $templates
 */
class QueryFeedModerationTemplatesResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<QueryFeedModerationTemplate>|null List of moderation templates */
        #[ArrayOf(QueryFeedModerationTemplate::class)]
        public ?array $templates = null, // List of moderation templates
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
