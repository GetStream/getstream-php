<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RuleBuilderAction extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?BanOptions $banOptions = null,
        public ?FlagUserOptions $flagUserOptions = null,
        public ?CallActionOptions $callOptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
