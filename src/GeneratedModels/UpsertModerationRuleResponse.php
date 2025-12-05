<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * Basic response information
 *
 * @property string $duration
 * @property ModerationRuleV2Response|null $rule
 */
class UpsertModerationRuleResponse extends BaseModel
{
    public function __construct(
        public ?string $duration = null, // Duration of the request in milliseconds
        public ?ModerationRuleV2Response $rule = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
