<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class HarmConfig extends BaseModel
{
    public function __construct(
        /** @var array<ActionSequence>|null */
        #[ArrayOf(ActionSequence::class)]
        public ?array $actionSequences = null,
        public ?int $severity = null,
        public ?array $harmTypes = null,
        public ?int $threshold = null,
        public ?int $cooldownPeriod = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
