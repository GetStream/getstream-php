<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $action
 * @property string|null $name
 * @property string|null $team
 */
class BlockListRule extends BaseModel
{
    public function __construct(
        public ?string $action = null,
        public ?string $name = null,
        public ?string $team = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
