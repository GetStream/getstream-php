<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class ModerationActionConfig extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $description = null,
        public ?string $entityType = null,
        public ?string $icon = null,
        public ?int $order = null,
        public ?object $custom = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
