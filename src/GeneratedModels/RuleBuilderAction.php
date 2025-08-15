<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RuleBuilderAction extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?BanOptions $banOptions = null,
        public ?FlagContentOptions $flagContentOptions = null,
        public ?FlagUserOptions $flagUserOptions = null,
        public ?BlockContentOptions $removeContentOptions = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
