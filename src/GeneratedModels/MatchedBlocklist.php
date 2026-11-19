<?php

declare(strict_types=1);

namespace GetStream\GeneratedModels;
class MatchedBlocklist extends BaseModel
{
    public function __construct(
        public ?string $name = null, // Blocklist name, as set on the rule condition.
        public ?array $matches = null, // Distinct text the blocklist matched in the content, at most 10 values of up to 256 bytes each. Word, email and domain blocklists report a single match, in the normalized form they compare, even when several words hit; regex lists and domain/email allowlists report every match, except that an allowlist with LLM domain validation enabled reports the one URL the check kept. Regex lists match on the text with invisible characters removed, except the built-in URL list, which reports the URL as it appears in the content. Can be empty when the blocklist hit but no value was recorded (for example a flag stored before this field existed).
    ) {
    }

    // BaseModel automatically handles jsonSerialize(), toArray(), and fromJson() using constructor types!
    // Use #[JsonKey('user_id')] to override field names if needed.
}
