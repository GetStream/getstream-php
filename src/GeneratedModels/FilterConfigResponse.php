<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class FilterConfigResponse extends BaseModel
{
    public function __construct(
        public ?array $llmLabels = null, // LLM moderation labels available as filter values
        public ?array $aiTextLabels = null, // AI text moderation labels available as filter values
        public ?array $aiImageLabels = null, // AI image moderation labels available as filter values. Reflects the app's effective image taxonomy: custom Bodyguard taxonomy when enabled, otherwise the standard L1 label set.
        public ?array $aiImageTaxonomy = null, // AI image moderation labels available as filter values, as a map of L1 label to its L2 sub-labels. Reflects the app's effective image taxonomy: custom Bodyguard taxonomy when enabled, otherwise the standard catalogue of the org's enabled image providers.
        public ?array $configKeys = null, // Moderation config keys present in the queue, available as filter values
        public ?array $ruleNames = null, // Names of the app's moderation rules, available as filter values on the `label` field when filtering rule-flagged content. Includes disabled rules, since items flagged before a rule was turned off still carry its name; excludes deleted ones. Scoped to the caller's teams on a multi-tenant app. Capped at 30 names, ordered by name, so an app above that cap is listed partially.
        public ?array $filterableCustomKeys = null, // The moderation_payload.custom keys the app has configured as review-queue filter chips (via moderation_dashboard_preferences.filterable_custom_keys). Discovery hint for the dashboard only — the filter accepts any custom key regardless of this list.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
