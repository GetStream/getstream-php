<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CreatePolicyTestSetRequest extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Display name; unique within an app
        public ?string $mode = null, // Execution target: 'check' or 'labels'. Optional — defaults to 'labels' when the org has the labels API enabled, 'check' otherwise
        public ?string $configKey = null, // Moderation config key (default: app default)
        public ?string $team = null, // Team scope for the config (optional)
        /** @var array<PolicyTestRow>|null */
        #[ArrayOf(PolicyTestRow::class)]
        public ?array $rows = null, // Messages to test; capped at 1000. Mutually exclusive with seed
        public ?PolicyTestSeedSpec $seed = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
