<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;

use JsonSerializable;
/**
 * 
 */
class RuleBuilderCondition extends BaseModel
{
    public function __construct(
        public ?int $confidence = null,
        public ?string $type = null,
        public ?ContentCountRuleParameters $contentCountRuleParams = null,
        public ?ImageContentParameters $imageContentParams = null,
        public ?ImageRuleParameters $imageRuleParams = null,
        public ?TextContentParameters $textContentParams = null,
        public ?TextRuleParameters $textRuleParams = null,
        public ?UserCreatedWithinParameters $userCreatedWithinParams = null,
        public ?UserCustomPropertyParameters $userCustomPropertyParams = null,
        public ?UserRuleParameters $userRuleParams = null,
        public ?VideoContentParameters $videoContentParams = null,
        public ?VideoRuleParameters $videoRuleParams = null,
    ) {}

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
