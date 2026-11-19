<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class ModerationEngineConfigRequest extends BaseModel
{
    public function __construct(
        public ?string $provider = null, // llm, nlp or stream. Empty follows the app's LLM moderation setting
        public ?string $model = null, // LLM model used when the provider resolves to llm, or a Stream model with provider stream (an alias, or a pinned version the server accepts). Not allowed with provider nlp. Empty uses the app's moderation settings, or the latest Stream model
        public ?string $reasoningEffort = null, // OpenAI reasoning effort for model. Requires model, and must be one the model accepts. Empty uses the model's default
        public ?string $strictness = null, // How sure a Stream model must be before it flags: relaxed, balanced or strict. Only with provider stream. Empty is balanced
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
