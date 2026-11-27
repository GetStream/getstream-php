<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The rules a reaction is checked against.
 */
class ReactionValidation extends BaseModel
{
    public function __construct(
        public ?object $schema = null, // A JSON Schema 2020-12 object validating {reaction, user}
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
