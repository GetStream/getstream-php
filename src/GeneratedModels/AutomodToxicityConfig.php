<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property bool|null $async
 * @property bool|null $enabled
 * @property array<AutomodRule>|null $rules
 */
class AutomodToxicityConfig extends BaseModel
{
    public function __construct(
        public ?bool $async = null,
        public ?bool $enabled = null,
        /** @var array<AutomodRule>|null */
        #[ArrayOf(AutomodRule::class)]
        public ?array $rules = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
