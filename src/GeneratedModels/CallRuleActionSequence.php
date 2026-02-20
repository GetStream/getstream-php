<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class CallRuleActionSequence extends BaseModel
{
    public function __construct(
        public ?int $violationNumber = null,
        public ?array $actions = null,
        public ?CallActionOptions $callOptions = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
