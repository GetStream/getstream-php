<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class RuleBuilderCondition extends BaseModel
{
    public function __construct(
        public ?string $type = null,
        public ?int $confidence = null,
        public ?TextRuleParameters $textRuleParams = null,
        public ?ImageRuleParameters $imageRuleParams = null,
        public ?VideoRuleParameters $videoRuleParams = null,
        public ?UserRuleParameters $userRuleParams = null,
        public ?ContentCountRuleParameters $contentCountRuleParams = null,
        public ?FlagCountRuleParameters $userFlagCountRuleParams = null,
        public ?FlagCountRuleParameters $contentFlagCountRuleParams = null,
        public ?UserIdenticalContentCountParameters $userIdenticalContentCountParams = null,
        public ?TextContentParameters $textContentParams = null,
        public ?ImageContentParameters $imageContentParams = null,
        public ?VideoContentParameters $videoContentParams = null,
        public ?UserCreatedWithinParameters $userCreatedWithinParams = null,
        public ?UserCustomPropertyParameters $userCustomPropertyParams = null,
        public ?UserRoleParameters $userRoleParams = null,
        public ?KeyframeRuleParameters $keyframeRuleParams = null,
        public ?ClosedCaptionRuleParameters $closedCaptionRuleParams = null,
        public ?CallTypeRuleParameters $callTypeRuleParams = null,
        public ?CallCustomPropertyParameters $callCustomPropertyParams = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
