<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The app's message schema settings: how strictly messages and reactions are checked, and the JSON Schemas they are checked against.
 */
class MessageSchemaSettings extends BaseModel
{
    public function __construct(
        public ?string $mode = null, // How violations are handled: off does not check, report checks and records violations without rejecting the write, enforce rejects writes that violate the schema. Defaults to off
        public ?int $documentVersion = null, // The settings document version to use. When omitted, the latest version is used; an unknown version is rejected
        public ?MessageValidation $message = null, // The rules a message is checked against.
        public ?ReactionValidation $reaction = null, // The rules a reaction is checked against.
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
