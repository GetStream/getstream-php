<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AIAudioConfigRequest extends BaseModel
{
    public function __construct(
        public ?string $profile = null, // Bodyguard credentials profile to classify transcripts with. Applies to the NLP engine only; ignored when LLM configurability is enabled. Empty falls back to the app-pinned profile, then the organization's top-level credentials
        /** @var array<BodyguardRule>|null */
        #[ArrayOf(BodyguardRule::class)]
        public ?array $rules = null, // Deprecated pre-split rule list. Still the live config while no engine config exists; once one does it is kept as a fallback for whichever engine has none of its own
        public ?AITextConfig $aiTextConfig = null,
        public ?LLMConfig $llmConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
