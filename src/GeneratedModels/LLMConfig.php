<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property string|null $appContext
 * @property bool|null $async
 * @property bool|null $enabled
 * @property array<LLMRule>|null $rules
 * @property array|null $severityDescriptions
 */
class LLMConfig extends BaseModel
{
    public function __construct(
        public ?string $appContext = null,
        public ?bool $async = null,
        public ?bool $enabled = null,
        /** @var array<LLMRule>|null */
        #[ArrayOf(LLMRule::class)]
        public ?array $rules = null,
        public ?array $severityDescriptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
