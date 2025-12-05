<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string $type
 * @property BanOptions|null $banOptions
 * @property FlagUserOptions|null $flagUserOptions
 */
class RuleBuilderAction extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?BanOptions $banOptions = null,
        public ?FlagUserOptions $flagUserOptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
