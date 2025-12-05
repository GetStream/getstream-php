<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $duration
 * @property array<ConfigResponse> $configs
 * @property string|null $next
 * @property string|null $prev
 */
class QueryModerationConfigsResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null,
        /** @var array<ConfigResponse>|null List of moderation configurations */
        #[ArrayOf(ConfigResponse::class)]
        public ?array $configs = null, // List of moderation configurations
        public ?string $next = null,
        public ?string $prev = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
