<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class SearchAllRequest extends BaseModel
{
    public function __construct(
        public ?string $query = null, // Free-text search phrase, 1-80 characters after trimming whitespace. Required. Matched as a prefix of a user's name or username and of a channel's name, and as full-text against message text
        public ?array $entities = null, // Which sections to search: any subset of messages, users and channels. Defaults to all three when omitted; must not be empty when provided. Response sections always appear in the order messages, users, channels
        public ?int $limit = null, // Number of results per section, 1-30. Defaults to 10. Applies to every requested section; there is no per-section limit
        public ?array $next = null, // Opaque pagination cursors from a previous response, keyed by entity. A cursor that fails to decode restarts that section from page 1 with a cursor_rejected warning; the request fails with 400 only when every cursor supplied for a requested entity is invalid. Cursors for entities not in entities are ignored
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
