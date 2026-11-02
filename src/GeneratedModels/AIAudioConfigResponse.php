<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class AIAudioConfigResponse extends BaseModel
{
    public function __construct(
        public ?bool $enabled = null, // Whether the engine selected by the application's LLM configurability flag has a rule that does something. Derived, not stored
        public ?string $profile = null, // Bodyguard credentials profile transcripts are classified with. Applies to the NLP engine only
        /** @var array<BodyguardRule>|null */
        #[ArrayOf(BodyguardRule::class)]
        public ?array $rules = null, // The active engine's rules, flattened into the pre-split shape for clients that predate the per-engine configs. This is the whole config for a policy that has no per-engine config stored
        public ?AITextConfig $aiTextConfig = null,
        public ?LLMConfig $llmConfig = null,
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
