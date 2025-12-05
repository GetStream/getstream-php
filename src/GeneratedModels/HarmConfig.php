<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * 
 *
 * @property int|null $cooldownPeriod
 * @property int|null $severity
 * @property int|null $threshold
 * @property array<ActionSequence>|null $actionSequences
 * @property array|null $harmTypes
 */
class HarmConfig extends BaseModel
{
    public function __construct(
        public ?int $cooldownPeriod = null,
        public ?int $severity = null,
        public ?int $threshold = null,
        /** @var array<ActionSequence>|null */
        #[ArrayOf(ActionSequence::class)]
        public ?array $actionSequences = null,
        public ?array $harmTypes = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
