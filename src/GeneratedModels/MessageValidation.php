<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
/**
 * The rules a message is checked against.
 */
class MessageValidation extends BaseModel
{
    public function __construct(
        public ?object $schema = null, // A JSON Schema 2020-12 object validating {message, user}
        public ?array $frozenFields = null, // Message document paths that cannot change after the message is created
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
